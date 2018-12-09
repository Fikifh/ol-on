<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use rizalafani\rajaongkirlaravel\RajaOngkirFacade;
use Laravolt\Indonesia\Facade;

class apiController extends Controller
{
    public function getProvice(){
        $data = Facade::allProvinces();                                                        
        return response()->json($data, 200);    
    }  
    public function getAllCities(){
        $data = Facade::allCities();
        return response()->json($data, 200);
    }
    public function getAllDistrict(){
        $data = Facade::allDistricts();
        return response()->json($data, 200);
    }    
    public function getAllVillage(){
        $data = Facade::allVillages();
        return response()->json($data, 200);
    }
    public function findProvince($with){
        $data = Facade::findProvince($provinceId, $with = null);
        return response()->json($data, 200);
    }
    public function findCity($with){
        $data = Facade::findCity($cityId, $with = null);
        return response()->json($data, 200);
    }
    public function findDistrict($with){
        Facade::findDistrict($districtId, $with = null);
        return response()->json($data, 200, $headers);
    }
    public function findVillage($with){
        Facade::findVillage($villageId, $with = null);
        return response()->json($data, 200, $headers);
    }
}
