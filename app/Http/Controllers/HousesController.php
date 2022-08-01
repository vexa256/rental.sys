<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\Houses;
use App\Models\Locations;
use App\Models\HouseRooms;
use Illuminate\Http\Request;

class HousesController extends Controller
{
    public function MgtRooms()
    {
        $HouseRooms = HouseRooms::all();

        $data = [

            "Title"   => "Manage Supported Property Room Setups",
            "Rooms"   => $HouseRooms,
            "Page"    => "sys.rooms.MgtRooms",
            "NewRoom" => "true",

        ];

        return view("sys.views.index", $data);
    }

    public function CreateRooms(request $request)
    {
        $validated = $request->validate([
            'Rooms'      => 'required|integer',
            'BathRooms'  => 'required|integer',
            'Kitchen'    => 'required|integer',
            'DiningRoom' => 'required|integer',
            'Store'      => 'required|integer',
            'ExtraRooms' => 'required|integer',
            'SetupName'  => 'required|string',

        ]);

        $HouseRooms             = new HouseRooms;
        $HouseRooms->Rooms      = $request->Rooms;
        $HouseRooms->BathRooms  = $request->BathRooms;
        $HouseRooms->Kitchen    = $request->Kitchen;
        $HouseRooms->DiningRoom = $request->DiningRoom;
        $HouseRooms->SetupName  = $request->SetupName;
        $HouseRooms->Store      = $request->Store;
        $HouseRooms->ExtraRooms = $request->ExtraRooms;
        $HouseRooms->RoomID     = Hash::make($request->Rooms . 'gshsja' . date('y/m/d'));

        $HouseRooms->save();

        return redirect()->back()->with('status', 'New Room Setup Created Successfully');

    }

    public function DeleteRooms($id)
    {
        $HouseRooms = HouseRooms::find($id);

        $HouseRooms->delete();

        return redirect()->back()->with('status', 'The selected room has been deleted successfully');

    }

    public function MgtHouses()
    {
        $Locations  = Locations::all();
        $HouseRooms = HouseRooms::all();
        $houses     = DB::table('houses AS H')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->join('house_rooms AS R', 'R.RoomID', '=', 'H.RoomID')

            ->select('H.*', 'L.*', 'R.*', 'H.id AS hid', 'H.desc AS HouseDesc')

            ->get();

        $data = [

            "Title"      => "Manage Houses/Properties Available to Tenants",
            "Page"       => "sys.houses.MgtHouses",
            "Houses"     => $houses,
            "Properties" => "true",
            "Locations"  => $Locations,
            "HouseRooms" => $HouseRooms,
            "DoNotShow"  => "true",
        ];

        return view("sys.views.index", $data);

    }

    public function CreateHouses(request $request)
    {
        $validated = $request->validate([
            'TenantCapacity' => 'required|integer',
            'Price_Monthly'  => 'required|integer',
            'desc'           => 'required',
            'LocID'          => 'required',
            'House'          => 'required|unique:houses',
            'RoomID'         => 'required',

        ]);

        $count = Houses::where("RoomID", $request->RoomID)
            ->where('House', $request->House)
            ->count();

        if ($count < 1) {
            $Houses = new Houses;

            $Houses->TenantCapacity    = $request->TenantCapacity;
            $Houses->Price_Monthly     = $request->Price_Monthly;
            $Houses->desc              = $request->desc;
            $Houses->LocID             = $request->LocID;
            $Houses->House             = $request->House;
            $Houses->RoomID            = $request->RoomID;
            $Houses->OccupiedCapacity  = 0;
            $Houses->AvailableCapacity = $request->TenantCapacity;
            $Houses->HouseID           = Hash::make(date('Y-M-D') . 'js' . $request->LocID);
            $Houses->save();

            return redirect()->back()->with('status', "New property created successfully");

        } else {
            return redirect()->back()->with('error_a', "Property Setup already added to registered property list");

        }

    }

    public function DeleteProperty($hid)
    {
        $houses = Houses::find($hid);
        $houses->delete();

        return redirect()->back()->with("status", "The selected property has been deleted successfully");

    }
}
