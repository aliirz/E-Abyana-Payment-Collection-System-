<?php

namespace App\Http\Controllers\RegionAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Halqa;
use App\Models\Tehsil;
use App\Models\District;
use App\Models\Divsion;
use DB;
class HalqaController extends Controller
{
    public function Addhalqa(){
        $halqas = DB::table('halqa')
        ->join('tehsils', 'halqa.tehsil_id', '=', 'tehsils.tehsil_id')
        ->join('districts', 'tehsils.district_id', '=', 'districts.id')
        ->join('divisions', 'districts.div_id', '=', 'divisions.id')
        ->select(
            'halqa.id as id', // Include halqa ID if needed
            'halqa.halqa_name as halqa_name',
            'tehsils.tehsil_id as tehsil_id', // Include tehsil ID if needed
            'tehsils.tehsil_name as tehsil_name',
            'districts.id as district_id', // Include district ID if needed
            'districts.name as district_name',
            'divisions.id as division_id', // Include division ID if needed
            'divisions.divsion_name as divsion_name'
        )
        ->get();
    

        $tehsils = Tehsil::all(); 
        $divsions = Divsion::all(); 
        $districts = District::all(); 
       
        return view('RegionManagments.AddHalqa')
        ->with('tehsils',$tehsils)
        ->with('districts',$districts)->with('halqas',$halqas);
}
public function getTehsils($districtId)
{
    // Fetch tehsils related to the district ID
    $tehsils = Tehsil::where('district_id', $districtId)->get(['tehsil_id', 'tehsil_name']); // Ensure 'id' and 'tehsil_name' exist in your database

    // Return the response as JSON
    return response()->json($tehsils);
}

public function storeHalqa(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'halqa_name' => 'required|string|unique:halqa,halqa_name',
        'tehsil_id' => 'required|exists:tehsils,tehsil_id',
    ], [
        'halqa_name.unique' => 'The halqa name has already been taken.',
        'halqa_name.required' => 'The halqa name is required.',
        'tehsil_id.required' => 'The tehsil is required.',
        'tehsil_id.exists' => 'The selected tehsil does not exist.',
    ]);

    // Create a new Halqa record
    Halqa::create([
        'halqa_name' => $request->halqa_name,
        'tehsil_id' => $request->tehsil_id,
    ]);

    return redirect()->back()->with('success', 'Halqa created successfully!');
}

}
