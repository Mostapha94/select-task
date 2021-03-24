<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ListCountries extends Component
{
    /**
    * get all countries
    * @return countries
    */
    public function getAllCountries()
    {
        try {
            $client = new \SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");
            $response =json_encode($client->ListOfCountryNamesByName());
            $data = json_decode($response,true);
            return $data['ListOfCountryNamesByNameResult']['tCountryCodeAndName'];
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    public function render()
    {
        return view('livewire.list-countries',[
            'countries' => $this->getAllCountries()
        ]);
    }
}
