<?php

namespace App\Http\Controllers\RegionAdministration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cropprice;

class PriceController extends Controller
{
    public function Addprice(){
    
      
        return view('RegionManagments.Addprice');
        
   
}
    public function Storeprice(Request $request)
{
    
    $validated = $request->validate([
        'crop_price' => 'required|string|max:255',
        'final_crop' => 'required|string|max:255',
    ]);

    // Store in the database
    Cropprice::create([
        'crop_price' => $request->crop_price,
        'final_crop' => $request->final_crop,
    ]);
    // Flash success message
    Session()->flash('success', 'Data Has Been Submitted Successfully');


    
    return redirect()->back();
}
}
