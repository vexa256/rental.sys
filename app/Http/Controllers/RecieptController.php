<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Houses;
use App\Models\Tenants;
use DB;
use Illuminate\Http\Request;

class RecieptController extends Controller {

    public function RecieptSelectHouses() {

        $Houses = Houses::all();

        $data = [

            "Page"   => "sys.reciepts.SelectHouse",
            "Title"  => "Select House To Attach Tenant's Payment Reciept To",
            "Houses" => $Houses,

        ];

        return view('sys.views.index', $data);

    }

    public function SelectTenantReciepts(Request $request) {

        $HouseName = $request->House;

        $Count = DB::table('houses AS H')

            ->where('H.House', $HouseName)

            ->join('property_assignments AS P', 'P.HouseID', '=', 'H.HouseID')

            ->join('tenants AS T', 'P.TenantID', '=', 'P.TenantID')

            ->join('payments AS PT', 'P.TenantID', '=', 'P.TenantID')

            ->select('T.*', 'PT.*')

            ->count();

        if ($Count < 1) {

            return redirect()->route('RecieptSelectHouses')->with("status", "The selected query returned no results, please try again");
        }

        $Tenants = DB::table('houses AS H')

            ->where('H.House', $HouseName)

            ->join('property_assignments AS P', 'P.HouseID', '=', 'H.HouseID')

            ->join('tenants AS T', 'P.TenantID', '=', 'P.TenantID')

            ->join('payments AS PT', 'P.TenantID', '=', 'P.TenantID')

            ->select('T.*', 'PT.*')

            ->get()->unique('tenant');

        $data = [

            "Page"      => "sys.reciepts.SelectTenant",
            "Title"     => "Select Tenant and Year To Attach Payment Records To",
            "Tenants"   => $Tenants,
            "HouseName" => $HouseName,

        ];

        return view('sys.views.index', $data);
    }

    public function GenerateTenantReciept(Request $request) {

        $slectedTenant = $request->Tenant;
        $Year          = $request->Year;

        $Tenants = Tenants::where('tenant', $slectedTenant)->first();

        $Payments = DB::table('property_assignments AS P')

            ->join('locations AS L', 'L.locID', '=', 'P.locID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->where('T.tenant', $slectedTenant)

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('payments AS PT', 'PT.TenantID', '=', 'T.TenantID')

            ->where('PT.Year', $Year)

            ->select('HR.*', 'H.*', 'P.*', 'T.*', 'L.*', 'PT.*')

            ->get();

        $data = [

            "Page"          => "sys.reciepts.rec",
            "Title"         => " Rent Payment Reciept For the Tenant " . $slectedTenant . " Showing all months paid for",
            "slectedTenant" => $slectedTenant,
            "Payments"      => $Payments,
            "Tenants"       => $Tenants,

        ];

        return view('sys.views.index', $data);
    }
}
