<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Houses;
use App\Models\Locations;
use Illuminate\Http\Request;
use App\Models\PropertyAssignments;
use App\Http\Controllers\Controller;

class PayHistoryController extends Controller
{
    public function PayHistSelectHouse()
    {
        $Houses = DB::table('houses AS H')->select('H.*')->get();

        $data = [

            "Page"   => "sys.history.SelectHouse",
            "Title"  => "Select house  whose tenant payment history is required",
            "Houses" => $Houses,

        ];

        return view('sys.views.index', $data);
    }

    private function ReturnPaymentHistory($LocID, $HouseID)
    {
        $data = DB::table('payments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->where('L.locID', $LocID)

            ->where('H.HouseID', $HouseID)

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->join('property_assignments AS PS', 'PS.TenantID', '=', 'P.TenantID')

            ->select('H.*', 'HR.*', 'P.*', 'T.*', 'L.*', 'P.id AS PID', 'P.Amount AS Pay',

                'P.created_at AS CAT', 'PS.RoomNo')

            ->get();

        return $data;
    }

    private function HistoryCounter($LocID, $HouseID)
    {

        $data = DB::table('payments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->where('L.locID', $LocID)

            ->where('H.HouseID', $HouseID)

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->select('H.*', 'HR.*', 'P.*', 'T.*', 'L.*', 'P.id AS PID', 'P.Amount AS Pay')

            ->count();

        return $data;
    }

    public function SelectLocationHist(Request $request)
    {
        $NAME = $request->House;

        $Houses = Houses::where("House", $NAME)->first();

        $Locations = Locations::where('locID', $Houses->LocID)->get();

        $data = [

            "Page"      => "sys.history.SelectLocation",
            "Title"     => "Select the location to bind the tenant payment history to",
            "Locations" => $Locations,
            "House"     => $NAME,

        ];

        return view('sys.views.index', $data);
    }

    public function PayHistoryReport(Request $request)
    {
        $House = $request->House;
        $loc   = $request->Locations;

        $Houses = Houses::where("House", $House)->first();

        $Locations = Locations::where('Locations', $loc)->first();

        $TotalTenants = PropertyAssignments::where("HouseID", $Houses->HouseID)->count();

        if ($this->HistoryCounter($Locations->locID, $Houses->HouseID) < 1) {

            return redirect()->route('PayHistSelectHouse')->with('error_a', 'The selected query returned no results. Please try again with another search criteria');

        } else {

            $history = $this->ReturnPaymentHistory($Locations->locID, $Houses->HouseID);

            $data = [

                "Page"         => "sys.history.PayHistory",
                "Title"        => "Tenant Payment history for the selected house and applicable location | Use the table search to filter tenants",
                "loc"          => $loc,
                "House"        => $House,
                "history"      => $history,
                "TotalTenants" => $TotalTenants,

            ];

            return view('sys.views.index', $data);
        }
    }
}
