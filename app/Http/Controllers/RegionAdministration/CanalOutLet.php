<?php

namespace App\Http\Controllers\RegionAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Village;
use App\Models\canal;
class CanalOutLet extends Controller
{
    public function AddOutlet(){
        $canals = canal::all(); 
        $outlets = Outlet::with('canal')->get(); 
        return view('RegionManagments.CanalOutlet',compact('canals','outlets'));
    
}

public function storeOutlet(Request $request)
{


    // Create a new Canal Outlet record
    Outlet::create([
        'outlet_name' => $request->outlet_name,
        'canal_id' => $request->canal_id,
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Canal outlet created successfully!');
}

}