<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Houses;
use App\Models\Payments;
use App\Charts\ChartMethod;
use Illuminate\Http\Request;
use App\Models\DefaultedMonths;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{

    protected $Defaulter_Months  = null;
    protected $Defaulter_Amounts = null;

    public function ReportSelectHouse()
    {

        $Houses   = Houses::all();
        $Payments = Payments::all()->unique('Year');

        $data = [

            "Page"     => "sys.reports.SelectHouse",
            "Title"    => "Advanced  Report| House and year selection",
            "Houses"   => $Houses,
            "Payments" => $Payments,

        ];

        return view('sys.views.index', $data);
    }

    public function DefaultersGraph($HouseID, $Year)
    {
        $Year    = $Year;
        $HouseID = $HouseID;

        $arr_Months  = [];
        $arr_Amounts = [];

        $chart = new ChartMethod;

        for ($m = 1; $m <= 12; ++$m) {

            $Month = date('M', mktime(0, 0, 0, $m, 1));

            $dbCount = DefaultedMonths::where('DefaultedYear', $Year)
                ->where("HouseID", $HouseID)
                ->where('Month', $Month)
                ->count();

            if ($dbCount > 0) {

                $dbValue = DefaultedMonths::where('DefaultedYear', $Year)
                    ->where("HouseID", $HouseID)
                    ->where('Month', $Month)
                    ->sum('defaulted_amount');

                array_push($arr_Months, $Month);
                array_push($arr_Amounts, $dbValue);

            }

        }

        $this->Defaulter_Months  = $arr_Months;
        $this->Defaulter_Amounts = $arr_Amounts;

        $chart->labels($arr_Months);

        $chart->dataset('Visual monthly defaulting statistics for the selected house (Figures in UGX)', 'bar', $arr_Amounts)
            ->color('Red')
            ->backgroundColor('Maroon');

        $chart->height(300);

        return $chart;

    }

    public function RevenueReport(Request $request)
    {

        $year  = $request->Year;
        $house = $request->House;
        $a     = Houses::where('House', $house)->first();

        $arr_Months  = [];
        $arr_Amounts = [];

        $chart = new ChartMethod;

        for ($m = 1; $m <= 12; ++$m) {

            $Month = date('M', mktime(0, 0, 0, $m, 1));

            $dbCount = Payments::where('Year', $year)
                ->where("HouseID", $a->HouseID)
                ->where('Month', $Month)
                ->count();

            if ($dbCount > 0) {

                $dbValue = Payments::where('Year', $year)
                    ->where("HouseID", $a->HouseID)
                    ->where('Month', $Month)
                    ->sum('Amount');

                array_push($arr_Months, $Month);
                array_push($arr_Amounts, $dbValue);

            }

        }

        $chart->labels($arr_Months);

        $chart->dataset('Total Payments per month (UGX)', 'bar', $arr_Amounts)
            ->color('Black')
            ->backgroundColor('Purple');

        $chart->height(300);

        $DefChart = $this->DefaultersGraph($a->HouseID, $year);

        $data = [

            "Page"        => "sys.reports.RevenueReport",
            "Title"       => "Advanced report for the selected house showing monthly payment and defaulting analytics",
            "House"       => $house,
            "Year"        => $year,
            'chart'       => $chart,
            'DefChart'    => $DefChart,
            'LoadChart'   => 'true',
            'DefShosw'    => 'true',
            'arr_Months'  => $arr_Months,
            'arr_Amounts' => $arr_Amounts,
            'DefAmounts'  => $this->Defaulter_Amounts,
            'DefMonths'   => $this->Defaulter_Months,
            'Payments'    => $this->ReturnPay($a->HouseID, $year),
            'Defaulted'   => $this->ReturnDef($a->HouseID, $year),

        ];

        return view('sys.views.index', $data);

    }

    public function ReturnPay($HouseID, $Year)
    {

        $data = DB::table('payments AS P')

            ->where('P.Year', $Year)

            ->where("P.HouseID", $HouseID)

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->join('property_assignments AS PS', 'PS.TenantID', '=', 'P.TenantID')

            ->select('P.*', 'T.tenant', "PS.*")

            ->get();

        return $data;

    }

    public function ReturnDef($HouseID, $Year)
    {

        $data = DB::table('defaulted_months AS DF')

            ->where('DF.DefaultedYear', $Year)

            ->where("DF.HouseID", $HouseID)

            ->join('tenants AS T', 'T.TenantID', '=', 'DF.TenantID')

            ->join('property_assignments AS PS', 'PS.TenantID', '=', 'DF.TenantID')

            ->select('DF.*', 'T.tenant', "PS.*")

            ->get();

        return $data;

    }
}
