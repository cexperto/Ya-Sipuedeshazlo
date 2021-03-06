<?php

namespace App\Http\Controllers\Backend\employer;
use App\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
//4.580999194058937,  -74.20530903287658
class ServiceController extends Controller
{
    public function findServices(Request $request, Service $service){
        /*  */
        $name = $request->input('name');
        $lat = $request->input('latbox');
        $lng = $request->input('longbox');
        $distance = $request->input('distance');
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
        $sql = "SELECT *,
                (6371 * acos(cos(radians($lat)) * cos(radians(latbox)) * cos(radians(longbox)
                - radians($lng)) + sin(radians($lat)) * sin(radians(latbox))))
                AS distance
                FROM services WHERE status='Disponible' and name='$name' ORDER BY distance DESC";
       
        $services = DB::select($sql);
        return view('services',[
            'services' => Service::with('user')->latest()->paginate()
        ]);
        //return view('employer.index',compact('services'));
        /* return view('employer.index',[
            'services'=>$services
            ]); */
        //return $services;


    }

}
/* env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=5b3b70680fae3c
MAIL_PASSWORD=ff45bb70d08e14
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=sipuedeshazloya@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
 */