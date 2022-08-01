<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Houses;
use App\Models\Locations;
use App\Models\Occupancy;
use App\Models\HouseRooms;
use App\Http\Controllers\Controller;

class OccupancyController extends Controller
{

    public function CheckAvailability($HouseID, $TenantID)
    {
        $status = null;

        $Occupancy = Occupancy::where('HouseID', $HouseID)->count();
        $Houses    = Houses::where('HouseID', $HouseID)->first();

        if ($Occupancy == $Houses->TenantCapacity) {

            $status                    = 'false';
            $Houses->status            = $status;
            $Houses->OccupiedCapacity  = $Occupancy;
            $Houses->AvailableCapacity = 0;
            $Houses->save();

            return $status;

        } elseif ($Occupancy < $Houses->TenantCapacity) {

            $status = 'true';

            return $status;
        }

    }

    public function DeleteLogic($HouseID, $TenantID)
    {
        $status = null;

        $Occupancy = Occupancy::where('HouseID', $HouseID)->count();
        $Houses    = Houses::where('HouseID', $HouseID)->first();

        if ($Occupancy < $Houses->TenantCapacity) {

            $status                   = 'true';
            $Houses->status           = $status;
            $Houses->OccupiedCapacity = $Houses->OccupiedCapacity - 1;
            $Houses->save();

            return $status;
        }
    }

    public function FullyOccupied()
    {
        $Locations  = Locations::all();
        $HouseRooms = HouseRooms::all();
        $houses     = DB::table('houses AS H')

            ->where('H.status', 'false')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->join('house_rooms AS R', 'R.RoomID', '=', 'H.RoomID')

            ->select('H.*', 'L.*', 'R.*', 'H.id AS hid', 'H.desc AS HouseDesc')

            ->get();

        $data = [

            "Title"      => "View all fully occupied  houses/properties",
            "Page"       => "sys.houses.FullyOccup",
            "Houses"     => $houses,
            "Locations"  => $Locations,
            "HouseRooms" => $HouseRooms,
            "DoNotShow"  => "true",
            "Occup"      => "true",
        ];

        return view("sys.views.index", $data);

    }

    public function PartialOcc()
    {
        $Locations  = Locations::all();
        $HouseRooms = HouseRooms::all();
        $houses     = DB::table('houses AS H')

            ->where('H.status', 'true')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->join('house_rooms AS R', 'R.RoomID', '=', 'H.RoomID')

            ->select('H.*', 'L.*', 'R.*', 'H.id AS hid', 'H.desc AS HouseDesc')

            ->get();

        $data = [

            "Title"      => "View all partially occupied  houses/properties",
            "Page"       => "sys.houses.FullyOccup",
            "Houses"     => $houses,
            "Locations"  => $Locations,
            "HouseRooms" => $HouseRooms,
            "DoNotShow"  => "true",
            "Occup"      => "true",
        ];

        return view("sys.views.index", $data);

    }

}
