<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CountriesResource;
use App\Http\Resources\CountryResource;
use App\Models\Country;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Exception;

class CountryController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of all countries.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $countries=Country::orderBy('id','desc')->paginate(10);
            if(!count($countries))
                return $this->noResultsFound('countries');
            $additional['response']=$this->checkCountOfItems($countries,__('All Countries'));
            return CountriesResource::collection($countries)->additional($additional);
        }catch(Exception $ex){
            return $this->someThingError($ex->getMessage());
        }
    }
    /**
     * Display the country by country code.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($countryCode)
    {
        try{
            $country=Country::where('code',$countryCode)->first();
            $additional['response']=$this->checkGetItemById($country);
            if($country)
                return (new CountryResource($country))->additional($additional);
            return $additional['response'];
        }catch(Exception $ex){
            return $this->someThingError($ex->getMessage());
        }
    }
    /**
     * store countries in data base
     * @param $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        try{
            $client = new \SoapClient("http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL");
            $response =json_encode($client->ListOfCountryNamesByName());
            $data = json_decode($response,true);
            $countries=$data['ListOfCountryNamesByNameResult']['tCountryCodeAndName'];
            foreach($countries as $i=>$country)
            {
                $obj = Country::firstOrNew(
                    ['code' =>  $country['sISOCode']],
                    ['name' =>  $country['sName']]
                );
                $obj->save();                
            }
            session()->flash('success','New countries saved successfully !');
            return redirect()->back();

        }catch(Exception $ex){
            return $this->someThingError($ex->getMessage());
        }
    }

}
