<?php

namespace App\Http\Controllers\RegionAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Divsion;
class DivsionController extends Controller
{
    public function AddDivsion(){
    
        $divsions = Divsion::all(); 
        return view('RegionManagments.AddDivsion', compact('divsions',));
        
   
}
public function StoreDivsion(Request $request)
{
    // Validation
    $validated = $request->validate([
        'divsion_name' => 'required|string|max:255',
        
    ]);

    // Store in the database
    Divsion::create([
        'divsion_name' => $request->divsion_name,

    ]);
    // Flash success message
    Session()->flash('success', 'Data Has Been Submitted Successfully');


    
    return redirect()->back();
}
public function destroy($id)
{
    $Divsion = Divsion::findOrFail($id);
    $Divsion->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}

}
