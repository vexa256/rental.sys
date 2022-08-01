<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Houses;
use App\Models\Locations;
use Illuminate\Http\Request;
use App\Models\PropertyAssignments;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentsController;

date_default_timezone_set('Africa/Kampala');

class DefaultersController extends Controller
{

    public function __construct()
    {
        $a = new PaymentsController;
        $a->RunBoot();
    }

    public function DefSelectHouse()
    {

        $Houses = DB::table('houses AS H')->select('H.*')->get();

        $data = [

            "Page"   => "sys.defs.DefSelectHouse",
            "Title"  => "Select house  whose  defaulter's history is required",
            "Houses" => $Houses,

        ];

        return view('sys.views.index', $data);
    }

    private function ReturnDefHistory($LocID, $HouseID)
    {
        $data = DB::table('defaulted_months AS D')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'D.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'D.HouseID')

            ->join('locations AS L', 'L.locID', '=', 'D.LocID')

            ->join('tenants AS T', 'T.TenantID', '=', 'D.TenantID')

            ->where('L.locID', $LocID)

            ->where('H.HouseID', $HouseID)

            ->join('property_assignments AS P', 'P.TenantID', '=', 'D.TenantID')

            ->select('P.*', 'L.*', 'H.*', 'D.*', 'T.*', 'HR.*', 'D.created_at AS CT')

            ->get();

        return $data;
    }

    private function DefCounter($LocID, $HouseID)
    {

        $data = DB::table('defaulted_months AS D')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'D.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'D.HouseID')

            ->join('locations AS L', 'L.locID', '=', 'D.LocID')

            ->join('tenants AS T', 'T.TenantID', '=', 'D.TenantID')

            ->where('L.locID', $LocID)

            ->where('H.HouseID', $HouseID)

            ->select('L.*', 'H.*', 'D.*', 'T.*', 'HR.*', 'D.created_at AS CT')

            ->count();

        return $data;
    }

    public function DefLocSelect(Request $request)
    {
        $NAME = $request->House;

        $Houses = Houses::where("House", $NAME)->first();

        $Locations = Locations::where('locID', $Houses->LocID)->get();

        $data = [

            "Page"      => "sys.defs.SelectLocation",
            "Title"     => "Select the location to bind the defaulter's history to",
            "Locations" => $Locations,
            "House"     => $NAME,

        ];

        return view('sys.views.index', $data);
    }

    public function DefReport(Request $request)
    {
        $House = $request->House;

        $loc = $request->Locations;

        $Houses = Houses::where("House", $House)->first();

        $Locations = Locations::where('Locations', $loc)->first();

        $TotalTenants = PropertyAssignments::where("HouseID", $Houses->HouseID)->count();

        //dd($this->DefCounter($Locations->locID, $Houses->HouseID));

        if ($this->DefCounter($Locations->locID, $Houses->HouseID) < 1) {

            return redirect()->route('PayHistSelectHouse')->with('error_a', 'The selected query returned no results. Please try again with another search criteria');

        } else {

            $history = $this->ReturnDefHistory($Locations->locID, $Houses->HouseID);

            $data = [

                "Page"         => "sys.defs.DefReport",
                "Title"        => "Defaulter's report for the selected house and applicable location | Use the table search to filter tenants",
                "loc"          => $loc,
                "House"        => $House,
                "history"      => $history,
                "TotalTenants" => $TotalTenants,
                "TotalCount"   => $this->DefCounter($Locations->locID, $Houses->HouseID),

            ];

            return view('sys.views.index', $data);
        }
    }
}
