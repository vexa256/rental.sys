<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Validator;
use App\Models\Houses;
use App\Models\Tenants;
use App\Http\Controllers;
use App\Models\Occupancy;
use App\Models\HouseRooms;
use Illuminate\Http\Request;
use App\Models\PropertyAssignments;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OccupancyController;
use App\Http\Controllers\PaymentScheduleController;

class TenantsController extends Controller
{

    protected $AssignID = null;

    public function MgtTenants()
    {
        $Tenants = Tenants::all();
        $data    = [

            "Page"     => "sys.tenants.MgtTenants",
            "Title"    => "Manage Tenants Currently Registered",
            "Tenants"  => $Tenants,
            "TenantsD" => "true",

        ];

        return view('sys.views.index', $data);
    }

    public function NewTenant(Request $request)
    {
        $validated = $request->validate([
            'tenant'      => 'required|string',
            'id_type'     => 'required|string',
            'Idscan'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'Email'       => 'required|email|unique:tenants',
            'Occupation'  => 'required|string',
            'Phone'       => 'required|unique:tenants',
            'Occupants'   => 'required|integer',
            'Nationality' => 'required|string',
            'Sex'         => 'required|string',

        ]);

        $Tenants  = new Tenants;
        $email    = $request->Email;
        $fileName = time() . '.' . $request->Idscan->extension();
        $request->Idscan->move(public_path('uploads/tenants'), $fileName);
        $Tenants->Idscan = 'uploads/tenants/' . $fileName;

        $Tenants->Email       = $request->Email;
        $Tenants->tenant      = $request->tenant;
        $Tenants->id_type     = $request->id_type;
        $Tenants->Occupation  = $request->Occupation;
        $Tenants->Phone       = $request->Phone;
        $Tenants->Occupants   = $request->Occupants;
        $Tenants->Nationality = $request->Nationality;
        $Tenants->Sex         = $request->Sex;
        $Tenants->TenantID    = Hash::make($email . date('y - m - d'));

        $Tenants->save();

        return redirect()->back()->with("status", "New tenant created successfully");

    }

    public function DeleteTenant($id)
    {
        $Tenants = Tenants::find($id);
        $Tenants->delete();

        return redirect()->back()->with("status", "New tenant deleted successfully");

    }

    public function UpdateTenant(Request $request)
    {
        $validated = $request->validate([
            'id'          => 'required',
            'tenant'      => 'string',
            'id_type'     => 'string',
            'Idscan'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'Email'       => 'email',
            'Occupation'  => 'string',
            'Phone'       => 'required',
            'Occupants'   => 'integer',
            'Nationality' => 'string',
            'Sex'         => 'string',

        ]);
        $id      = $request->id;
        $Tenants = Tenants::find($id);

        if (!empty($request->input('Idscan'))) {

            unlink(public_path($Tenants->Idscan));

            $fileName = time() . '.' . $request->Idscan->extension();
            $request->Idscan->move(public_path('uploads/tenants'), $fileName);
            $Tenants->Idscan = 'uploads/tenants/' . $fileName;

        }

        $Tenants->Email       = $request->Email;
        $Tenants->tenant      = $request->tenant;
        $Tenants->id_type     = $request->id_type;
        $Tenants->Occupation  = $request->Occupation;
        $Tenants->Phone       = $request->Phone;
        $Tenants->Occupants   = $request->Occupants;
        $Tenants->Nationality = $request->Nationality;
        $Tenants->Sex         = $request->Sex;

        $Tenants->save();
        return redirect()->back()->with("status", "New tenant info has been updated successfully");

    }

    public function SelectTenant()
    {

        $Tenants = Tenants::all();
        $Houses  = Houses::all();

        $data = [

            "Page"       => "sys.tenants.AssignPropertySelect",
            "Title"      => "Assign a rental property to a tenant",
            "Houses"     => $Houses,
            "Tenants"    => $Tenants,
            "LoadPicker" => "true",

        ];

        return view('sys.views.index', $data);

    }

    public function AssignmentRoom(Request $request)
    {
        $validated = $request->validate([
            'House'  => 'required',
            'Tenant' => 'string',

            /*  'Amount'   => 'string|integer',
        'end_date' => 'required|date',*/

        ]);

        $Tenants    = Tenants::where("Tenant", $request->Tenant)->first();
        $Houses     = Houses::where("House", $request->House)->first();
        $HouseRooms = HouseRooms::where("RoomID", $Houses->RoomID)->get();

        $data = [

            "Page"     => "sys.tenants.SelectRoom",
            "Title"    => "Assign room type to tenant",
            "House"    => $Houses->House,
            "Tenant"   => $Tenants->tenant,
            "TenantID" => $Tenants->TenantID,

            "Rooms"    => $HouseRooms,

        ];

        return view('sys.views.index', $data);

    }

    public function DeleteAssignment($id)
    {
        $Exec = PropertyAssignments::find($id);

        $Occupancy = Occupancy::where('TenantID', $Exec->TenantID)
            ->where('HouseID', $Exec->HouseID)
            ->first();

        $Occupancy->delete();

        $Exec->delete();

        $Avail = new OccupancyController;

        $Avail->DeleteLogic($Exec->HouseID, $Exec->TenantID);

        // $this->UpdateOccupancy($Exec->HouseID);

        return redirect()->route('AssignPropertySelect')
            ->with(
                'status',
                'The selected tenant
                property assignment
                has been revoked
                ');
    }

    public function Assignment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'House'    => 'required',
            'TenantID' => 'string|required|unique:property_assignments',
            'Tenant'   => 'string|required',
            'Room'     => 'required',
            'RoomNo'   => 'required|unique:property_assignments',

        ]);

        if ($validator->fails()) {
            return redirect()->route('SelectTenant')
                ->withErrors($validator)
                ->withInput();

        }

        $date     = date('Y-m-d');
        $year     = date('Y');
        $month    = date('M');
        $Room     = HouseRooms::where("SetupName", $request->Room)->first();
        $Tenants  = Tenants::where("tenant", $request->Tenant)->first();
        $Houses   = Houses::where("House", $request->House)->first();
        $AssignID = Hash::make(date('Y-m-d h:i:sa') . 'date' . $Room->RoomID);

        $Avail = new OccupancyController;

        $Checker_ss = $Avail->CheckAvailability($Houses->HouseID, $Tenants->TenantID);

        if ($Checker_ss == 'false') {

            return redirect()->route('SelectTenant')->with('error_a', "The selected house is occupied fully, Please assign the tenant another house ");
        }

        if ($Houses->status == 'false') {

            return redirect()->route('SelectTenant')->with('error_a', "The selected house is occupied fully, Please assign the tenant another house ");

        }

        if ($Houses->status == 'false') {

            return redirect()->route('SelectTenant')->with('error_a', "The selected house is occupied fully, Please assign the tenant another house ");

        } else {

            $O               = new Occupancy;
            $O->HouseID      = $Houses->HouseID;
            $O->TenantID     = $Tenants->TenantID;
            $O->RoomID       = $Houses->RoomID;
            $O->AssignmentID = $AssignID;
            $O->LocID        = $Houses->LocID;
            $O->save();

            $Assign = new PropertyAssignments;

            $Assign->RoomID   = $Room->RoomID;
            $Assign->TenantID = $Tenants->TenantID;
            $Assign->locID    = $Houses->LocID;
            $Assign->HouseID  = $Houses->HouseID;
            $Assign->RoomNo   = $request->RoomNo;
            $Assign->AssignID = $AssignID;

            $Assign->save();

            $UniqueID = $Assign->id;

            $Asi = new PaymentScheduleController;

            $Asi->ExecuteSchedule();

            return redirect()->route("AssignReportSelectTenant", ["id" => $UniqueID])->with('status', 'The selected tenant has been assigned a house successfully');

        }

    }

    public function AssignReportSelectTenant($id)
    {
        $schedule = new PaymentScheduleController;
        $schedule->ExecuteSchedule();
        $a = PropertyAssignments::find($id);

        $assign = DB::table('property_assignments AS P')

            ->where('P.id', $a->id)

            ->where('P.TenantID', $a->TenantID)

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select('H.*', 'HR.*', 'P.*', 'P.id AS PID', 'T.*', 'L.*')

            ->first();

        $data = [

            "Page"  => "sys.tenants.MgtAssignments",
            "data"  => $assign,
            "Title" => "Manage Tenant Property Assignment, This interface shows the selected tenant and their assigned property/house",

        ];

        return view('sys.views.index', $data);

    }

    public function AssignPropertySelect()
    {
        $Tenants = Tenants::all();

        $data = [

            "Page"    => "sys.tenants.TenantReportSelect",
            "Tenants" => $Tenants,
            "Title"   => "Property Assignement Report",

        ];

        return view('sys.views.index', $data);
    }

    public function AssignmentReport(Request $request)
    {

        $name    = $request->Tenant;
        $Tenants = Tenants::where('tenant', $name)->first();
        $id      = $Tenants->TenantID;

        $PropertyAssignments = PropertyAssignments::where('TenantID', $id)->first();

        $counter = PropertyAssignments::where('TenantID', $id)->count();

        if ($counter < 1) {
            return redirect()->back()->with("status", "The selected tenant has no rental property assigned to them");

        }
        $a = PropertyAssignments::find($PropertyAssignments->id);

        $Asi = new PaymentScheduleController;

        $Asi->ExecuteSchedule();

        $assign = DB::table('property_assignments AS P')

            ->where('P.id', $a->id)

            ->where('P.TenantID', $a->TenantID)

            ->join('house_rooms AS HR', 'HR.RoomID', '=', 'P.RoomID')

            ->where('P.RoomID', $a->RoomID)

            ->where('P.HouseID', $a->HouseID)

            ->join('houses AS H', 'H.HouseID', '=', 'P.HouseID')

            ->join('tenants AS T', 'T.TenantID', '=', 'P.TenantID')

            ->join('locations AS L', 'L.locID', '=', 'H.LocID')

            ->select('H.*', 'HR.*', 'P.*', 'T.*', 'L.*', 'P.id AS PID')

            ->first();

        $data = [

            "Page"  => "sys.tenants.MgtAssignments",
            "data"  => $assign,
            "Title" => "Manage Tenant Property Assignment",

        ];

        return view('sys.views.index', $data);
    }
}
