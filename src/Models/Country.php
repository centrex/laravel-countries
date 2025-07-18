<?php

declare(strict_types = 1);

namespace Centrex\LaravelCountries\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * CountryList
 */
class Country extends Model
{
    /**
     * @var string
     *             The table for the countries in the database, is "countries" by default.
     */
    protected $table;

    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->table = config('countries.table_name');
    }

    /**
     * @var array
     */
    protected $countries = [];

    /**
     * Get the countries from the JSON file, if it hasn't already been loaded.
     *
     * @return array
     */
    protected function getCountries()
    {
        // Get the countries from the JSON file
        if (is_null($this->countries) || empty($this->countries)) {
            $this->countries = json_decode(file_get_contents(__DIR__ . '/data/countries.json'), true);
        }

        // Return the countries
        return $this->countries;
    }

    /**
     * Returns one country
     *
     * @param  string  $id  The country id
     * @return array
     */
    public function getOne($id)
    {
        $countries = $this->getCountries();

        return $countries[$id];
    }

    /**
     * Returns a list of countries
     *
     * @param string sort
     * @return array
     */
    public function getList($sort = null)
    {
        // Get the countries list
        $countries = $this->getCountries();

        // Sorting
        $validSorts = [
            'capital',
            'citizenship',
            'country-code',
            'currency',
            'currency_code',
            'currency_sub_unit',
            'full_name',
            'iso_3166_2',
            'iso_3166_3',
            'name',
            'region-code',
            'sub-region-code',
            'eea',
            'calling_code',
            'currency_symbol',
            'flag',
        ];

        if (!is_null($sort) && in_array($sort, $validSorts)) {
            uasort($countries, function ($a, $b) use ($sort): int {
                if (!isset($a[$sort]) && !isset($b[$sort])) {
                    return 0;
                }

                if (!isset($a[$sort])) {
                    return -1;
                }

                if (!isset($b[$sort])) {
                    return 1;
                }

                return strcasecmp((string) $a[$sort], (string) $b[$sort]);
            });
        }

        // Return the countries
        return $countries;
    }

    /**
     * Returns a list of countries suitable to use with a select element in Laravelcollective\html
     * Will show the value and sort by the column specified in the display attribute
     *
     * @param string display
     * @return array
     */
    public function getListForSelect($display = 'name')
    {
        foreach ($this->getList($display) as $key => $value) {
            $countries[$key] = $value[$display];
        }

        // return the array
        return $countries;
    }
}
