<?php

namespace App\Http\Controllers\RegionAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Canal;

use App\Models\village;
class CanalController extends Controller
{
    public function AddCanal(){
        $villages = village::all(); 
        $canals = canal::with('village')->get(); 
        return view('RegionManagments.AddCanal',compact('villages','canals'));
   
}
public function storeCanal(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'canal_name' => 'required|string|unique:canals,canal_name',
        'village_id' => 'required|exists:villages,village_id',
    ], [
        'canal_name.unique' => 'The canal name has already been taken.',
        'canal_name.required' => 'The canal name is required.',
        'village_id.required' => 'The outlet is required.',
        'village_id.exists' => 'The selected outlet does not exist.',
    ]);

    // Create a new Canal record
    Canal::create([
        'canal_name' => $request->canal_name,
        'village_id' => $request->village_id,
    ]);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Canal created successfully!');
}

}
