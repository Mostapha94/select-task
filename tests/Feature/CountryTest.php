<?php

namespace Tests\Feature;

use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * test function of list all countries
     *
     * @return void
     */
    public function test_list_countries()
    {
        $response = $this->get('/api/all-countries');
        $response->assertStatus(200);
    }
      /**
     * test function of show country by countryCode
     *
     * @return void
     */
    public function test_show_country()
    {
        $response = $this->get('/api/country/AD');
        $response->assertStatus(200);
    }
}
