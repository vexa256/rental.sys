<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use App\Models\DefaultedMonths;
use App\Models\PaymentSchedule;
use App\Http\Controllers\Controller;

date_default_timezone_set('Africa/Kampala');

class PaymentScheduleController extends Controller
{

    private function ReturnTenants()
    {
        $data = DB::table('property_assignments AS P')

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select(
                'H.*',
                'HR.*',
                'P.*',
                'T.*',
                'L.*',
                'T.TenantID as TID',
            )

            ->get();

        return $data;
    }

    public function CreatePaymentSchedule()
    {
        $Tenants = $this->ReturnTenants();

        foreach ($Tenants as $data) {
            $check = PaymentSchedule::where("TenantID", $data->TID)
                ->count();

            if ($check < 1) {

                $newRecord = new PaymentSchedule;

                $newRecord->PaymentID = Hash::make($data->TID . date('Y-M-d h:i:sa'));

                $newRecord->PricePerMonth = $data->Price_Monthly;
                $newRecord->HouseID       = $data->HouseID;
                $newRecord->RoomID        = $data->RoomID;
                $newRecord->LocID         = $data->locID;
                $newRecord->TenantID      = $data->TenantID;
                $newRecord->Payment_Year  = date('Y');

                $newRecord->save();
            }
        }

    }
    public function CorrectPayemntYear()
    {
        $CurrentYear = date('Y');

        $Tenants = $this->ReturnTenants();

        foreach ($Tenants as $data) {
            $count = PaymentSchedule::where("TenantID", $data->TID)
                ->where("Payment_Year", $CurrentYear)
                ->count();

            if ($count < 1) {

                $newRecord = new PaymentSchedule;

                $newRecord->PaymentID = Hash::make($data->TID . date('Y-M-d h:i:sa'));

                $newRecord->PricePerMonth = $data->Price_Monthly;
                $newRecord->HouseID       = $data->HouseID;
                $newRecord->RoomID        = $data->RoomID;
                $newRecord->LocID         = $data->locID;
                $newRecord->TenantID      = $data->TenantID;
                $newRecord->Payment_Year  = date('Y');

                $newRecord->save();

            }
        }

    }
    public function SetCurrentMonth()
    {
        $M = date('M');
        $Y = date('Y');

        $Tenants = $this->ReturnTenants();

        foreach ($Tenants as $data) {

            $count = PaymentSchedule::where("TenantID", $data->TID)
                ->where($M, "unused")
                ->where('Payment_Year', $Y)
                ->count();

            if ($count > 0) {

                $update = PaymentSchedule::where("TenantID", $data->TID)
                    ->where($M, "unused")
                    ->where('Payment_Year', $Y)
                    ->first();

                $update->$M = "unpaid";

                $update->save();

            }

        }
    }

    public function DetectDefaulters()
    {

        $M = date('M');
        $Y = date('Y');

        $Tenants = $this->ReturnTenants();

        foreach ($Tenants as $data) {

            $count = PaymentSchedule::where("TenantID", $data->TID)
                ->where($M, "unpaid")
                ->where('Payment_Year', $Y)
                ->count();

            if ($count > 0) {

                $update = PaymentSchedule::where("TenantID", $data->TID)
                    ->where($M, "unpaid")
                    ->where('Payment_Year', $Y)
                    ->first();

                $update->$M               = "defaulted";
                $update->defaulted_amount = $update->defaulted_amount
                 + $data->Price_Monthly;

                $update->save();

                $Dcounter = DefaultedMonths::where('TenantID', $data->TenantID)
                    ->where('RoomID', $data->RoomID)
                    ->where('HouseID', $data->HouseID)
                    ->where('PaymentID', $update->PaymentID)
                    ->where('LocID', $data->LocID)
                    ->where('Month', $M)
                    ->count();

                if ($Dcounter < 1) {
                    $DefaultedMonths = new DefaultedMonths;

                    $DefaultedMonths->defaulted_amount = $data->Price_Monthly;
                    $DefaultedMonths->RoomID           = $data->RoomID;
                    $DefaultedMonths->HouseID          = $data->HouseID;
                    $DefaultedMonths->PaymentID        = $update->PaymentID;
                    $DefaultedMonths->LocID            = $data->locID;
                    $DefaultedMonths->TenantID         = $data->TenantID;
                    $DefaultedMonths->DefaultedYear    = $update->Payment_Year;
                    $DefaultedMonths->Month            = $M;
                    $DefaultedMonths->save();
                }

            }

        }

    }

    public function ExecuteSchedule()
    {

        $this->CreatePaymentSchedule();
        $this->CorrectPayemntYear();
        $this->SetCurrentMonth();
        $this->DetectDefaulters();

    }

}
