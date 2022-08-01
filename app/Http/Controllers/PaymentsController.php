<?php
namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use Carbon\Carbon;
use App\Models\Houses;
use App\Models\Tenants;
use App\Models\Payments;
use Illuminate\Http\Request;
use App\Models\DefaultedMonths;
use App\Models\PaymentSchedule;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DefaultersController;
use App\Http\Controllers\PaymentScheduleController;

date_default_timezone_set('Africa/Kampala');
class PaymentsController extends Controller
{
    protected $PaySchedule;

    public function __construct()
    {
        $this->PaySchedule = new PaymentScheduleController;

        $this->PaySchedule->ExecuteSchedule();
    }

    public function RunBoot()
    {
        $this->PaySchedule = new PaymentScheduleController;

        $this->PaySchedule->ExecuteSchedule();
    }

    public function EditPaymentStatus()
    {

        $Payments = Payments::where('Payment_validity', "true")
            ->orWhere('Payment_validity', null)
            ->get();

        foreach ($Payments as $data) {

            $isPast = Carbon::parse($data->end_date);

            if ($isPast->isPast()) {

                $Update                   = Payments::find($data->id);
                $Update->Payment_validity = "Payment Expired";

                $Update->save();
            }
        }
        return true;
    }

    private function ReturnTenants()
    {
        $assign = DB::table('property_assignments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('payment_schedules AS PY', 'PY.TenantID', '=', 'P.TenantID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select('H.*', 'PY.*', 'HR.*', 'P.*', 'P.id', 'T.*', 'L.*')

            ->get();

        return $assign;
    }

    private function ReturnTenantsID($id)
    {
        $data = DB::table('property_assignments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('payment_schedules AS PY', 'PY.TenantID', '=', 'P.TenantID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->where('T.id', $id)

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select('H.*', 'PY.*', 'PY.id AS PID', 'HR.*', 'P.*', 'P.id', 'T.*', 'L.*', 'T.id AS TID')

            ->first();

        return $data;
    }

    public function ReturnPaymentHistory($id)
    {
        $data = DB::table('payments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->where('T.id', $id)

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select('H.*', 'HR.*', 'P.*', 'T.*', 'L.*', 'P.id AS PID', 'P.Amount AS Pay')

            ->get();

        return $data;
    }

    public function ReturnPaymentHistoryCount($id)
    {
        $data = DB::table('payments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->where('T.id', $id)

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select('H.*', 'HR.*', 'P.*', 'T.*', 'L.*', 'P.id AS PID', 'P.Amount AS Pay')

            ->count();

        return $data;
    }

    public function SelectTenantPay()
    {
        $Tenants = $this->ReturnTenants();

        $data = [

            "Page"    => "sys.payments.SelectTenant",
            "Title"   => "Select tenant to attach payment to",
            "Tenants" => $Tenants,

        ];

        return view('sys.views.index', $data);
    }

    public function GetRecordPayment($id)
    {
        $a       = Tenants::where('id', $id)->first();
        $Tenants = $this->ReturnTenantsID($a->id);

        $data = [

            "Page"       => "sys.payments.RecordPayment",
            "Title"      => "Record payment for the tenant " . $Tenants->tenant,
            "data"       => $Tenants,
            "LoadPicker" => 'true',
            "LoadCk"     => 'true',

        ];

        return view('sys.views.index', $data);

    }

    public function SubmitPayment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'end_date' => 'required|date',
            'desc'     => 'required',
            'HouseID'  => 'required',
            'RoomID'   => 'required',
            'TenantID' => 'required',
            'LocID'    => 'required',
            'TID'      => 'required',
            'Amount'   => 'required|integer',

        ]);

        if ($validator->fails()) {
            return redirect()->route('GetRecordPayment', ['id' => $request->TID])->withErrors($validator)->withInput();
        }

        $date  = new Carbon($request->end_date);
        $year  = $date->year;
        $month = $date->month;

        $dates  = new Carbon(date('Y-m-d'));
        $years  = $dates->year;
        $months = $dates->month;

        $Payments = new Payments;

        $Payments->end_date    = $request->end_date;
        $Payments->desc        = $request->desc;
        $Payments->HouseID     = $request->HouseID;
        $Payments->RoomID      = $request->RoomID;
        $Payments->TenantID    = $request->TenantID;
        $Payments->LocID       = $request->LocID;
        $Payments->Amount      = $request->Amount;
        $Payments->end_Year    = $year;
        $Payments->end_Month   = $month;
        $Payments->start_Month = $months;
        $Payments->start_Year  = $years;
        $Payments->start_date  = $dates;
        $Payments->PaymentID   = Hash::make($request->Amount . $request->TenantID . date('Y-M-d'));

        $Payments->save();

        return $this->SelectPayHistory();

    }

    public function SelectPayHistory()
    {
        $this->EditPaymentStatus();

        $Tenants = $this->ReturnTenants();

        $data = [

            "Page"    => "sys.payments.SelectPayHistory",
            "Title"   => "Select tenant to attach payment report to",
            "Tenants" => $Tenants,

        ];

        return view('sys.views.index', $data);
    }

    public function PaymentHistory(Request $request)
    {

        $T = $request->Tenant;

        $Tenants = Tenants::where("Tenant", $T)->first();
        $jesse   = new DefaultersController;
        // return $jesse->SetDefaulters($Tenants->TenantID);

        if ($this->ReturnPaymentHistoryCount($Tenants->id) < 1) {

            return redirect()->back()->with("status", "No payment records detected for this client, Please select another client");

        } else {
            $History = $this->ReturnPaymentHistory($Tenants->id);

            $data = [

                "Page"    => "sys.payments.PaymentHistory",
                "Title"   => "Payment History For The Client " . $Tenants->tenant,
                "History" => $History,

            ];

            return view('sys.views.index', $data);

        }

    }

    public function RecordPayment(Request $request)
    {
        $a       = Tenants::where('tenant', $request->Tenant)->first();
        $Tenants = $this->ReturnTenantsID($a->id);

        $count = PaymentSchedule::where('TenantID', $Tenants->TenantID)
            ->where('PaidForMarked', 'false')
            ->count();

        if ($count > 0) {

            $data = [

                "Page"       => "sys.payments.MarkNotUsed",
                "Title"      => "Remove the months this tenant should not be billed for in their payment schedule.",
                "data"       => $Tenants,
                "LoadPicker" => 'true',
                "AppPay"     => 'true',
                "DoNotShow"  => 'true',

            ];

            return view('sys.views.index', $data);

        } else {
            $Years = PaymentSchedule::where('TenantID', $Tenants->TenantID)
                ->where('PaidForMarked', 'true')
                ->get();

            $data = [

                "Page"   => "sys.payments.SelectYear",
                "Title"  => "Record payments for the selected tenant",
                "tenant" => $Tenants,
                "Years"  => $Years,

            ];

            return view('sys.views.index', $data);
        }

    }

    public function RecordPaymentGET($id)
    {
        $a       = Tenants::where('id', $id)->first();
        $Tenants = $this->ReturnTenantsID($a->id);

        $count = PaymentSchedule::where('TenantID', $Tenants->TenantID)
            ->where('PaidForMarked', 'false')
            ->count();

        if ($count > 0) {

            $data = [

                "Page"       => "sys.payments.MarkNotUsed",
                "Title"      => "Remove the months this tenant should not be billed for in their payment schedule.",
                "data"       => $Tenants,
                "LoadPicker" => 'true',
                "AppPay"     => 'true',
                "DoNotShow"  => 'true',

            ];

            return view('sys.views.index', $data);

        } else {

            $Years = PaymentSchedule::where('TenantID', $Tenants->TenantID)
                ->where('PaidForMarked', 'true')
                ->get();

            $data = [

                "Page"   => "sys.payments.SelectYear",
                "Title"  => "Record payments for the selected tenant",
                "tenant" => $Tenants,
                "Years"  => $Years,

            ];

            return view('sys.views.index', $data);

        }

    }

    public function ManageMonthsPay(Request $request)
    {
        $ExtractTenantID = Tenants::where('TenantID', $request->TenantID)
            ->first();

        $id              = $ExtractTenantID->id;
        $PaymentSchedule = PaymentSchedule::where("HouseID", $request->HouseID)
            ->where("RoomID", $request->RoomID)
            ->where("TenantID", $request->TenantID)
            ->where("Payment_Year", $request->Payment_Year)
            ->first();

        for ($m = 1; $m <= 12; ++$m) {
            $Month = date('M', mktime(0, 0, 0, $m, 1));

            $PaymentSchedule->$Month = $request->$Month;
            $PaymentSchedule->save();

        }

        return redirect()->route("RecordPaymentGET", ['id' => $id])->with('status', "Disabled months have been set successfully");
    }

    public function ConfirmNotUsed($id)
    {

        $PaymentSchedule = PaymentSchedule::find($id);

        /*  Extract Tenants ID */

        $TenantsID = $PaymentSchedule->TenantID;
        $a         = Tenants::where('TenantID', $TenantsID)->first();
        $Tid       = $a->id;
        /*  Extract Tenants ID */

        $PaymentSchedule->PaidForMarked = "true";

        $PaymentSchedule->save();

        return redirect()->route("RecordPaymentGET", ['id' => $Tid])->with('status', "Disabled months have been set successfully, you can now proceed to record payments");
    }

    public function ReturnRecordPay(Request $request)
    {
        $id           = $request->id;
        $Payment_Year = $request->Payment_Year;

        $schedule = PaymentSchedule::find($id);

        $a = Tenants::where('TenantID', $schedule->TenantID)->first();

        $Tenant = $this->ReturnTenantsID($a->id);

        $Payments = Payments::where('TenantID', $schedule->TenantID)
            ->where('RoomID', $schedule->RoomID)
            ->where('HouseID', $schedule->HouseID)
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [

            "Page"         => "sys.payments.RecordPayment",
            "Title"        => "Record payments for the selected tenant",
            "schedule"     => $schedule,
            "data"         => $Tenant,
            "PayNOw"       => "true",
            "DoNotShow"    => "true",
            "id"           => $id,
            "Payment_Year" => $Payment_Year,
            "Payments"     => $Payments,

        ];

        return view('sys.views.index', $data);

    }
    public function ReturnRecordPayGet($id, $Payment_Year)
    {

        $schedule = PaymentSchedule::find($id);

        $a = Tenants::where('TenantID', $schedule->TenantID)->first();

        $Tenant = $this->ReturnTenantsID($a->id);

        $Payments = Payments::where('TenantID', $schedule->TenantID)
            ->where('RoomID', $schedule->RoomID)
            ->where('HouseID', $schedule->HouseID)
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [

            "Page"         => "sys.payments.RecordPayment",
            "Title"        => "Record payments for the selected tenant",
            "schedule"     => $schedule,
            "data"         => $Tenant,
            "PayNOw"       => "true",
            "DoNotShow"    => "true",
            "id"           => $id,
            "Payment_Year" => $Payment_Year,
            "Payments"     => $Payments,
        ];

        return view('sys.views.index', $data);

    }
    public function SubmitPay(Request $request)
    {

        $id           = $request->id;
        $Payment_Year = $request->Payment_Year;
        $Month        = $request->Month;
        $Pay          = PaymentSchedule::find($id);

        $Houses = Houses::where('HouseID', $Pay->HouseID)->first();

        $count = DefaultedMonths::where('TenantID', $Pay->TenantID)
            ->where('RoomID', $Pay->RoomID)
            ->where('Month', $Month)
            ->count();

        if ($count > 0) {

            $EjectDefaulterRecord = DefaultedMonths::where('TenantID', $Pay->TenantID)
                ->where('RoomID', $Pay->RoomID)
                ->where('Month', $Month)
                ->first();

            $EjectDefaulterRecord->delete();

        }

        $Payments           = new Payments;
        $Payments->HouseID  = $Pay->HouseID;
        $Payments->RoomID   = $Pay->RoomID;
        $Payments->TenantID = $Pay->TenantID;
        $Payments->Month    = $Month;
        $Payments->Year     = $Payment_Year;
        $Payments->Amount   = $Houses->Price_Monthly;

        $Payments->save();

        $Pay->$Month           = "Paid For";
        $Pay->defaulted_amount = 00;
        $Pay->save();

        return redirect()->route('ReturnRecordPayGet', [
            'id'           => $id,
            'Payment_Year' => $Payment_Year,
        ])->with('status', 'Payment for the selcted month has been recorded successfully');
    }

    public function ReversePayment(Request $request)
    {
        $id           = $request->id;
        $Payment_Year = $request->Payment_Year;
        $Month        = $request->Month;
        $Pay          = PaymentSchedule::find($id);

        if ("Paid For" == $Pay->$Month) {
            $Pay->$Month = "unused";
            $Pay->save();

            $this->RunBoot();

            $Payments = Payments::where('HouseID', $Pay->HouseID)
                ->where('RoomID', $Pay->RoomID)
                ->where('TenantID', $Pay->TenantID)
                ->where('Month', $Month)
                ->where('Year', $Payment_Year)
                ->first();

            $Payments->delete();

            return redirect()->route('ReturnRecordPayGet', [
                'id'           => $id,
                'Payment_Year' => $Payment_Year,
            ])->with('status', 'Payment for the selcted month has been reversed successfully');

        } else {
            return redirect()->route('ReturnRecordPayGet', [
                'id'           => $id,
                'Payment_Year' => $Payment_Year,
            ])->with('error_a', 'Payment for the selcted month not reversed, It has not been recorded for this client');
        }

    }

}
