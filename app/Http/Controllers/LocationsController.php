<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Hash;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function ManageLocations()
    {
        $Locations = Locations::all();
        $data      = [

            'Title'     => "Manage Supported Property Locations",
            'Locations' => $Locations,
            'Page'      => 'sys.locations.MgtLocations',
            'LocPage'   => 'true',

        ];

        return view('sys.views.index', $data);
    }

    public function AddLocation(Request $request)
    {

        //    / dd($request->Locations);
        $validated = $request->validate([
            'desc'      => 'required',
            'Locations' => 'required|unique:locations',
        ]);

        $Locations            = new Locations;
        $Locations->Locations = $request->Locations;
        $Locations->desc      = $request->desc;
        $Locations->LocID     = Hash::make($request->Location . 'start' . date('M-Y-d'));

        $Locations->save();

        return redirect()->back()->with('status', 'New location created successfully');

    }

    public function DeleteLocation($id)
    {
        $Locations = Locations::find($id);
        $Locations->delete();
        return redirect()->back()->with('status', 'The selected location has been deleted successfully');

    }
}
