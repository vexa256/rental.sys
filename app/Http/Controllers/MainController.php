<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentsController;
use App\Models\DefaultedMonths;
use App\Models\HouseRooms;
use App\Models\Houses;
use App\Models\Locations;
use App\Models\PropertyAssignments;
use App\Models\Tenants;
use App\Models\User;
use Illuminate\Http\Request;

date_default_timezone_set('Africa/Kampala');

class MainController extends Controller {

    public function __construct() {

        $PaymentsProcessor = new PaymentsController;
        $PaymentsProcessor->RunBoot();

    }

    public function VirtualOffice() {
        $Admins            = User::count();
        $Houses            = Houses::count();
        $Locations         = Locations::count();
        $FullyOccupied     = Houses::where('status', 'false')->count();
        $PartiallyOccupied = Houses::where('status', 'true')->count();
        $Defaulters        = DefaultedMonths::count();
        $Tenants           = Tenants::count();
        $RoomArchitectures = HouseRooms::count();
        $AssignedTenants   = PropertyAssignments::count();

        $data = [

            'Title'             => "Rental MGT Pro Dashboard | General System
            Statistics",
            "Page"              => "sys.stats.stats",
            "Adminss"           => $Admins,
            "Houses"            => $Houses,
            "Locations"         => $Locations,
            "FullyOccupied"     => $FullyOccupied,
            "PartiallyOccupied" => $PartiallyOccupied,
            "Defaulters"        => $Defaulters,
            "Tenants"           => $Tenants,
            "RoomArchitectures" => $RoomArchitectures,
            "AssignedTenants"   => $AssignedTenants,

        ];

        return view('sys.views.index', $data);
    }

    public function MgtAdmins() {
        $Admins = User::all();

        $data = [

            'Title'  => "Manage all admin accounts registered in the system",
            "Page"   => "sys.admins.MgtAdmins",
            "Admins" => $Admins,

        ];

        return view('sys.views.index', $data);
    }

    public function DeleteAdmins($id) {
        User::find($id)->delete();

        return redirect()->back()
            ->with('status', 'Admin account deleted successfully');
    }

    public function CreateNewAdmin(Request $request) {
        $validated = $request->validate([
            'name'     => 'required|unique:users',
            'email'    => 'required|unique:users',
            'password' => 'required',

        ]);

        $User           = new User;
        $User->name     = $request->name;
        $User->email    = $request->email;
        $User->password = $request->password;
        $User->save();

        return redirect()->back()
            ->with('status', 'Admin account created successfully');
    }
}
