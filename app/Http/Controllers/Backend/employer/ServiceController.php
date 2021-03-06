<?php

namespace App\Http\Controllers\Backend\employer;

use App\Http\Controllers\Controller;
use App\Service;
use App\User;
use App\Http\Requests\ServiceEmployerRequest;
use Illuminate\Http\Request;
use DB;
//4.580999194058937,  -74.20530903287658
class ServiceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function findServices(ServiceEmployerRequest $request){
        /*  */
        //return $request;
        $number= $request->input('distance');
        $name = $request->input('name');
        $lat = $request->input('latbox');
        $lng = $request->input('longbox');
        $distance = doubleval($number);
        //return $distance;       
        
        function getBoundaries($lat, $lng, $distance, $earthRadius = 6371)
        {
            $return = array();
        
            // Los angulos para cada dirección
            $cardinalCoords = array('north' => '0',
                                    'south' => '180',
                                    'east' => '90',
                                    'west' => '270');
            $rLat = deg2rad($lat);
            $rLng = deg2rad($lng);
            $rAngDist = $distance/$earthRadius;
            foreach ($cardinalCoords as $name => $angle)
            {
                $rAngle = deg2rad($angle);
                $rLatB = asin(sin($rLat) * cos($rAngDist) + cos($rLat) * sin($rAngDist) * cos($rAngle));
                $rLonB = $rLng + atan2(sin($rAngle) * sin($rAngDist) * cos($rLat), cos($rAngDist) - sin($rLat) * sin($rLatB));
                 $return[$name] = array('lat' => (float) rad2deg($rLatB),
                                        'lng' => (float) rad2deg($rLonB));
            }
            return array('min_lat'  => $return['south']['lat'],
                         'max_lat' => $return['north']['lat'],
                         'min_lng' => $return['west']['lng'],
                         'max_lng' => $return['east']['lng']);
        }

        /*  */
        
        $box = getBoundaries($lat, $lng, $distance);
        if($name=='todos'){
            $sql = "SELECT *,
                (6371 * acos(cos(radians($lat)) * cos(radians(latbox)) * cos(radians(longbox)
                - radians($lng)) + sin(radians($lat)) * sin(radians(latbox))))
                AS distance
                FROM services WHERE state='Disponible' ORDER BY distance DESC";
        
        $services = DB::select($sql);
        return view('Employer.index', compact('services'));
        }else{
            $sql = "SELECT *,
                    (6371 * acos(cos(radians($lat)) * cos(radians(latbox)) * cos(radians(longbox)
                    - radians($lng)) + sin(radians($lat)) * sin(radians(latbox))))
                    AS distance
                    FROM services WHERE state='Disponible' and names='$name' ORDER BY distance DESC";
            $services = DB::select($sql);  
            return view('Employer.index', compact('services'));
        }
        
        


       
    }

}
