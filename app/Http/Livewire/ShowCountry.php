<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowCountry extends Component
{
    /**
    * @var $country
    */
    protected $country;
    /**
    * get country by countryCode
    * @param $countryCode
    * @return country
    */
    public function mount($countryCode)
    {
        try {
            $client = new \SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");
            $response =json_encode($client->FullCountryInfo(array('sCountryISOCode'=>$countryCode)));
            $data = json_decode($response,true);
            $this->country=$data['FullCountryInfoResult'];
        }
        catch(\Exception $e) {
            return $e->getMessage();
        }
    }
    public function render()
    {
        return view('livewire.show-country',[
            'country' => $this->country,
        ]);
    }
}
