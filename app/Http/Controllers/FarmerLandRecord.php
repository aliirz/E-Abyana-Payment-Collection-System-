<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Village;
use App\Models\Outlet;
use App\Models\Tehsil;
use App\Models\District;
use App\Models\Canal;
use App\Models\Divsion;
use App\Models\Irrigator;
use App\Models\Crop;
use App\Models\Farmer;
use App\Models\Halqa;
use App\Models\LandRecord;
use App\Models\Cropprice;
use DB;

class FarmerLandRecord extends Controller
{
    public function LandRecord($id, $abs, $village_id,$canal_id, Request $request)
    {
        $villages = Village::find($village_id);

        if (!$villages) {
            return redirect()->back()->withErrors(['error' => 'Village not found']);
        }

        $survey = Irrigator::find($id);
        $districts = District::all();
        $tehsils = Tehsil::all();
        $divsions = Divsion::all();
        $canals = Canal::where('id', $canal_id)->first();
        $crops = Crop::all();
        $Outlets = Outlet::all();
        $Halqas = Halqa::all();
        $cropprice = Cropprice::all();
    
        return view('LandRecord.LandRecord', compact(
            'villages',
            'districts',
            'tehsils',
            'divsions',
            'canals',
            'crops',
            'Outlets',
            'Halqas',
            'survey',
            'cropprice'
        ));
    }
    
public function FarmerDistricts($divisionId)
{
    $districts = District::where('div_id', $divisionId)->get();
    return response()->json($districts);
}
public function FarmerTehsils($districtId)
{
    // Fetch tehsils related to the district ID
    $tehsils = Tehsil::where('district_id', $districtId)->get(['tehsil_id', 'tehsil_name']); // Ensure 'id' and 'tehsil_name' exist in your database

    // Return the response as JSON
    return response()->json($tehsils);
}
public function get_outlet($canal_id){
    $canals = Outlet::where('canal_id', $canal_id)->get();
    return response()->json($canals);
}

public function storeFarmer(Request $request)
{
    $validatedData = $request->validate([
        'khasra_number' => 'required|string|max:255',
        'tenant_name' => 'required|string|max:255',
        'registration_date' => 'required|date',
        'cultivators_info' => 'required|string|max:255',
        'snowing_date' => 'required|date',
        'land_assessment_marla' => 'required|string|max:255',
        'land_assessment_kanal' =>'required|string|max:255',
        'previous_crop' => 'required|string|max:255',
        'date' => 'required|date',
        'session_date' => 'required|string|max:255',
        'width' => 'required|numeric|min:0',
        'length' => 'required|numeric|min:0',
        'area_marla' => 'nullable|numeric|min:0',
        'area_kanal' => 'required|numeric|min:0',
        'double_crop_marla' => 'required|string|max:255',
        'double_crop_kanal' => 'required|string|max:255',
        'identifable_area_marla' =>'required|string|max:255',
        'identifable_area_kanal' =>'required|string|max:255',
        'irrigated_area_marla' => 'required|numeric|min:0',
        'irrigated_area_kanal' => 'required|numeric|min:0',
        'land_quality' => 'required|string|max:255',
        'irrigator_khata_number' => 'required|string|max:255',
        'village_id' => 'required|exists:villages,village_id',
        'irrigator_id' => 'required|exists:irrigators,id',
        'canal_id' => 'required|exists:canals,id',
        'crop_id' => 'required|exists:crops,id',
        'outlet_id' => 'required|exists:outlets,id',
        'finalcrop_id' => 'required|exists:cropprices,id',
        'crop_price' => 'required|string|max:255',
        'is_billed' => 'required|numeric|max:255',
        'review' => 'required|string|max:255',
        'status' => 'required|numeric|max:255',
    ]);
    LandRecord::create($validatedData);
    session()->flash('success', 'Data has been submitted successfully!');
    return redirect()->back();
}

public function surveyReviewForward(Request $request, $crop_survey_id)
{
    $validatedData = $request->validate([
        'review' => 'required|string|max:255',
    ]);
    $cropsurvey = LandRecord::findOrFail($crop_survey_id);
    $cropsurvey->review = $validatedData['review'];
    $cropsurvey->status = 2;
    $cropsurvey->save();
    session()->flash('success', 'Survey review has been updated successfully!');
    return redirect()->route('ListLandSurveyZilladar');
}
public function surveyReviewReverse(Request $request, $crop_survey_id)
{
    $validatedData = $request->validate([
        'review' => 'required|string|max:255',
    ]);
    $cropsurvey = LandRecord::findOrFail($crop_survey_id);
    $cropsurvey->review = $validatedData['review'];
    $cropsurvey->status = 0;
    $cropsurvey->save();
    session()->flash('success', 'Survey review has been updated successfully!');
    return redirect()->route('ListLandSurveyZilladar');
}

public function surveyReviewForwardCollector(Request $request, $crop_survey_id)
{
    $validatedData = $request->validate([
        'review' => 'required|string|max:255',
    ]);
    $cropsurvey = LandRecord::findOrFail($crop_survey_id);
    $cropsurvey->review = $validatedData['review'];
    $cropsurvey->status = 3;
    $cropsurvey->save();
    session()->flash('success', 'Survey review has been updated successfully!');
    return redirect()->route('ListLandSurveyCollector');
}
public function surveyReviewReverseCollector(Request $request, $crop_survey_id)
{
    $validatedData = $request->validate([
        'review' => 'required|string|max:255',
    ]);
    $cropsurvey = LandRecord::findOrFail($crop_survey_id);
    $cropsurvey->review = $validatedData['review'];
    $cropsurvey->status = 1;
    $cropsurvey->save();
    session()->flash('success', 'Survey review has been updated successfully!');
    return redirect()->route('ListLandSurveyCollector');
}
public function surveyReviewForwardPatwari(Request $request, $crop_survey_id)
{
    $validatedData = $request->validate([
        'review' => 'required|string|max:255',
    ]);
    $cropsurvey = LandRecord::findOrFail($crop_survey_id);
    $cropsurvey->review = $validatedData['review'];
    $cropsurvey->status = 1;
    $cropsurvey->save();
    session()->flash('success', 'Survey review has been updated successfully!');
    return redirect()->route('ListLandSurvey');
}


public function ListBills()
{
    $halqa_id = session('halqa_id');
    $query_survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->select(
            'cropsurveys.irrigator_id',
            'irrigators.irrigator_name',
            'irrigators.irrigator_khata_number',
            'villages.village_name',
            'cropsurveys.crop_survey_id',
            'cropsurveys.status'
        );

      if ($halqa_id > 0) {
        $survey_get =$query_survey->where('villages.halqa_id', '=', $halqa_id)
      ->where('cropsurveys.status', '=', 3)
      ->where('cropsurveys.is_billed', '=', 1)
      ->get();
       }else{
        $survey_get = $query_survey
        ->where('cropsurveys.status', '=', 3)
        ->where('cropsurveys.is_billed', '=', 1)
        ->get();
       }
    $grouped_survey_bill_eligible = $survey_get->groupBy('irrigator_id');

    return view('LandRecord.ListIrrigatorsBills', compact('grouped_survey_bill_eligible'));
}
public function LandSurvey()
{
    $halqa_id = session('halqa_id');
    //return view('LandRecord.ListLandSurvey', compact('halqa_id'));
    // return view('LandRecord.ListLandSurvey', ['halqa_id' => $halqa_id]);
    $query_survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->select(
            'cropsurveys.irrigator_id',
            'irrigators.irrigator_name',
            'irrigators.irrigator_khata_number',
            'villages.village_name',
            'cropsurveys.crop_survey_id',
            'cropsurveys.cultivators_info',
            'cropprices.final_crop',
            'cropsurveys.crop_price',
            'cropsurveys.date',
            'cropsurveys.width',
            'cropsurveys.length',
            'cropsurveys.area_marla',
            'cropsurveys.area_kanal',
            'cropsurveys.status'
        );

        if ($halqa_id > 0) {
            $query_survey->where('villages.halqa_id', '=', $halqa_id)
                         ->where('cropsurveys.status', '=', 0);
        }

   $survey_get = $query_survey
    ->where('cropsurveys.status', '=', 0)
    ->get();
    $grouped_survey = $survey_get->groupBy('irrigator_id');

    return view('LandRecord.ListLandSurvey', compact('grouped_survey'));
}

public function IrrigatorsForApproval()
{
    // $halqa_id = session('halqa_id');
    // return view('LandRecord.ListLandSurvey', compact('halqa_id'));
    // return view('LandRecord.ListLandSurvey', ['halqa_id' => $halqa_id]);
    
    $query_survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->select(
            'cropsurveys.irrigator_id',
            'irrigators.irrigator_name',
            'irrigators.irrigator_khata_number',
            'villages.village_name',
            DB::raw('SUM(((area_marla / 20) + area_kanal) * crop_price) AS total_bill_amount'),
            'cropsurveys.status'
        )
        ->where('cropsurveys.status', '=', 3)
        ->where('cropsurveys.is_billed', '=', 0)
        ->groupBy('cropsurveys.irrigator_id', 'irrigators.irrigator_name', 'irrigators.irrigator_khata_number', 'villages.village_name', 'cropsurveys.status')
        ->get();
    
    $grouped_survey_bill_eligible = $query_survey;

    return view('LandRecord.ListIrrigatorsApprovalName', compact('grouped_survey_bill_eligible'));
}
 
 public function IrrigatorsForBills()
{
    //$halqa_id = session('halqa_id');
    //return view('LandRecord.ListLandSurvey', compact('halqa_id'));
    // return view('LandRecord.ListLandSurvey', ['halqa_id' => $halqa_id]);
    $query_survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->select(
            'cropsurveys.irrigator_id',
            'irrigators.irrigator_name',
            'irrigators.irrigator_khata_number',
            'villages.village_name',
            'cropsurveys.crop_survey_id',
            'cropsurveys.status'
        );

       // if ($halqa_id > 0) {
         //   $query_survey->where('villages.halqa_id', '=', $halqa_id)
        //                 ->where('cropsurveys.status', '=', 1);
       // }

   $survey_get = $query_survey
    ->where('cropsurveys.status', '=', 3)
    ->where('cropsurveys.is_billed', '=', 1)
    ->get();
    $grouped_survey_bill_eligible = $survey_get->groupBy('irrigator_id');

    return view('LandRecord.ListIrrigatorsBillsName', compact('grouped_survey_bill_eligible'));
}



public function LandSurveyZilladar()
{
    $halqa_id = session('halqa_id');
    //return view('LandRecord.ListLandSurvey', compact('halqa_id'));
    // return view('LandRecord.ListLandSurvey', ['halqa_id' => $halqa_id]);
    $query_survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->select(
            'cropsurveys.irrigator_id',
            'irrigators.irrigator_name',
            'irrigators.irrigator_khata_number',
            'villages.village_name',
            'cropsurveys.crop_survey_id',
            'cropsurveys.cultivators_info',
            'cropprices.final_crop',
            'cropsurveys.crop_price',
            'cropsurveys.date',
            'cropsurveys.width',
            'cropsurveys.length',
            'cropsurveys.area_marla',
            'cropsurveys.area_kanal',
            'cropsurveys.status'
        );

        if ($halqa_id > 0) {
            $query_survey->where('villages.halqa_id', '=', $halqa_id)
                         ->where('cropsurveys.status', '=', 1);
        }

   $survey_get = $query_survey
    ->where('cropsurveys.status', '=', 1)
    ->get();
    $grouped_survey = $survey_get->groupBy('irrigator_id');

    return view('LandRecord.ListLandSurveyZilladar', compact('grouped_survey'));
}


public function LandSurveyCollector()
{
    $halqa_id = session('halqa_id');
    //return view('LandRecord.ListLandSurvey', compact('halqa_id'));
    // return view('LandRecord.ListLandSurvey', ['halqa_id' => $halqa_id]);
    $query_survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->select(
            'cropsurveys.irrigator_id',
            'irrigators.irrigator_name',
            'irrigators.irrigator_khata_number',
            'villages.village_name',
            'cropsurveys.crop_survey_id',
            'cropsurveys.cultivators_info',
            'cropprices.final_crop',
            'cropsurveys.crop_price',
            'cropsurveys.date',
            'cropsurveys.width',
            'cropsurveys.length',
            'cropsurveys.area_marla',
            'cropsurveys.area_kanal',
            'cropsurveys.status'
        );

        if ($halqa_id > 0) {
            $query_survey->where('villages.halqa_id', '=', $halqa_id)
                         ->where('cropsurveys.status', '=', 2);
        }

   $survey_get = $query_survey
    ->where('cropsurveys.status', '=', 2)
    ->get();
    $grouped_survey = $survey_get->groupBy('irrigator_id');

    return view('LandRecord.ListLandSurveyCollector', compact('grouped_survey'));
}


public function surveyView($id) {
    $survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.irrigator_id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number', 
            'cropsurveys.cultivators_info', 
            'cropprices.final_crop', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',

            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
        )
        ->where('cropsurveys.crop_survey_id', $id)
        ->first();
    if (!$survey) {
        return redirect()->back()->with('error', 'Survey not found.');
    }
    return view('LandRecord.viewSurvey', compact('survey'));
}

public function surveyViewForwardPatwari($id) {
    $survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.irrigator_id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number', 
            'cropsurveys.cultivators_info', 
            'cropprices.final_crop', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            'cropsurveys.review',
            'cropsurveys.status',

            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
        )
        ->where('cropsurveys.crop_survey_id', $id)
        ->first();
    if (!$survey) {
        return redirect()->back()->with('error', 'Survey not found.');
    }
    return view('LandRecord.viewSurveyPatwariForward', compact('survey'));
}

public function surveyViewForward($id) {
    $survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.irrigator_id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number', 
            'cropsurveys.cultivators_info', 
            'cropprices.final_crop', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            'cropsurveys.review',
            'cropsurveys.status',

            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
        )
        ->where('cropsurveys.crop_survey_id', $id)
        ->first();
    if (!$survey) {
        return redirect()->back()->with('error', 'Survey not found.');
    }
    return view('LandRecord.viewSurveyForward', compact('survey'));
}

public function surveyViewReverse($id) {
    $survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.irrigator_id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number', 
            'cropsurveys.cultivators_info', 
            'cropprices.final_crop', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            'cropsurveys.review',
            'cropsurveys.status',

            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
        )
        ->where('cropsurveys.crop_survey_id', $id)
        ->first();
    if (!$survey) {
        return redirect()->back()->with('error', 'Survey not found.');
    }
    return view('LandRecord.viewSurveyReverse', compact('survey'));
}

public function surveyViewForwardCollector($id) {
    $survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.irrigator_id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number', 
            'cropsurveys.cultivators_info', 
            'cropprices.final_crop', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            'cropsurveys.review',

            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
        )
        ->where('cropsurveys.crop_survey_id', $id)
        ->first();
    if (!$survey) {
        return redirect()->back()->with('error', 'Survey not found.');
    }
    return view('LandRecord.viewSurveyCollectorForward', compact('survey'));
}
public function surveyViewReverseCollector($id) {
    $survey = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.irrigator_id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number', 
            'cropsurveys.cultivators_info', 
            'cropprices.final_crop', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            'cropsurveys.review',

            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
        )
        ->where('cropsurveys.crop_survey_id', $id)
        ->first();
    if (!$survey) {
        return redirect()->back()->with('error', 'Survey not found.');
    }
    return view('LandRecord.viewSurveyCollectorReverse', compact('survey'));
}


public function surveyBillView($id) {
    // Fetch all records from cropsurveys for the given irrigator_id
    $surveys = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->join('tehsils', 'halqa.tehsil_id', '=', 'tehsils.tehsil_id')
        ->join('districts', 'tehsils.district_id', '=', 'districts.id')
        ->join('divisions', 'districts.div_id', '=', 'divisions.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.cultivators_info', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            
            // Single record fields from related tables
            'irrigators.id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number',
            'cropprices.final_crop', 
            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
            'tehsils.tehsil_name',
            'districts.name',
            'divisions.divsion_name',
        )
        ->where('cropsurveys.irrigator_id', $id)
        ->where('cropsurveys.status', '=', 3)
        ->where('cropsurveys.is_billed', '=', 1)
        ->get();

    if ($surveys->isEmpty()) {
        return redirect()->back()->with('error', 'Survey not found.');
    }

    $relatedData = $surveys->first();

    return view('LandRecord.viewBill', [
        'surveys' => $surveys,
        'relatedData' => $relatedData,
    ]);
}


public function surveyBillApprovalView($id) {
    // Fetch all records from cropsurveys for the given irrigator_id
    $surveys = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->join('tehsils', 'halqa.tehsil_id', '=', 'tehsils.tehsil_id')
        ->join('districts', 'tehsils.district_id', '=', 'districts.id')
        ->join('divisions', 'districts.div_id', '=', 'divisions.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.cultivators_info', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            
            // Single record fields from related tables
            'irrigators.id', 
            'irrigators.irrigator_name', 
            'irrigators.irrigator_khata_number',
            'cropprices.final_crop', 
            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
            'tehsils.tehsil_name',
            'districts.name',
            'divisions.divsion_name',
        )
        ->where('cropsurveys.irrigator_id', $id)
        ->where('cropsurveys.status', '=', 3)
        ->where('cropsurveys.is_billed', '=', 0)
        ->get();

    if ($surveys->isEmpty()) {
        return redirect()->back()->with('error', 'Survey not found.');
    }

    // Extract unique related data (from the first survey)
    $relatedData = $surveys->first();

    return view('LandRecord.viewBill', [
        'surveys' => $surveys,
        'relatedData' => $relatedData, 
    ]);
}

public function surveyApproved($irrigator_id) {
    LandRecord::where('irrigator_id', $irrigator_id)
        ->where('status', 3)
        ->update(['is_billed' => 1]);

    session()->flash('success', 'Approval Successful for matching records.');
    return redirect()->route('ListIrrigatorsForApprovals'); 
}

public function surveyBillMultiple(Request $request)
{
    $request->validate([
        'irrigator_ids' => 'required|array',
    ]);

    $irrigatorIds = $request->input('irrigator_ids');

    $surveys = DB::table('cropsurveys')
        ->join('villages', 'cropsurveys.village_id', '=', 'villages.village_id')
        ->join('halqa', 'villages.halqa_id', '=', 'halqa.id')
        ->join('irrigators', 'cropsurveys.irrigator_id', '=', 'irrigators.id')
        ->join('cropprices', 'cropsurveys.finalcrop_id', '=', 'cropprices.id')
        ->join('canals', 'cropsurveys.canal_id', '=', 'canals.id')
        ->join('crops', 'cropsurveys.crop_id', '=', 'crops.id')
        ->join('outlets', 'cropsurveys.outlet_id', '=', 'outlets.id')
        ->join('tehsils', 'halqa.tehsil_id', '=', 'tehsils.tehsil_id')
        ->join('districts', 'tehsils.district_id', '=', 'districts.id')
        ->join('divisions', 'districts.div_id', '=', 'divisions.id')
        ->select(
            'cropsurveys.crop_survey_id', 
            'cropsurveys.cultivators_info', 
            'cropsurveys.crop_price', 
            'cropsurveys.date', 
            'cropsurveys.width', 
            'cropsurveys.length', 
            'cropsurveys.area_marla', 
            'cropsurveys.area_kanal',
            'cropsurveys.session_date',
            'cropsurveys.khasra_number',
            'cropsurveys.tenant_name',
            'cropsurveys.registration_date',
            'cropsurveys.snowing_date',
            'cropsurveys.land_assessment_marla',
            'cropsurveys.land_assessment_kanal',
            'cropsurveys.previous_crop',
            'cropsurveys.double_crop_marla',
            'cropsurveys.double_crop_kanal',
            'cropsurveys.identifable_area_marla',
            'cropsurveys.identifable_area_kanal',
            'cropsurveys.irrigated_area_marla',
            'cropsurveys.irrigated_area_kanal',
            'cropsurveys.land_quality',
            'irrigators.id as irrigator_id',  
            'irrigators.irrigator_name', 
            'irrigators.irrigator_f_name', 
            'irrigators.irrigator_khata_number',
            'cropprices.final_crop', 
            'villages.village_name',
            'halqa.halqa_name',
            'canals.canal_name',
            'crops.crop_name',
            'outlets.outlet_name',
            'tehsils.tehsil_name',
            'districts.name',
            'divisions.divsion_name'
        )
        ->whereIn('cropsurveys.irrigator_id', $irrigatorIds)
        ->where('cropsurveys.status', '=', 3)
        ->where('cropsurveys.is_billed', '=', 1)
        ->get();

    $relatedData = $surveys->first();

    return view('LandRecord.viewBillAll', [
        'surveys' => $surveys,
        'relatedData' => $relatedData, 
    ]);
}


public function surveyApproveMultiple(Request $request) {
    $irrigatorIds = $request->input('irrigator_ids');

    if (empty($irrigatorIds)) {
        return response()->json(['success' => false, 'message' => 'No irrigators selected!']);
    }

    try {
        LandRecord::whereIn('irrigator_id', $irrigatorIds)
            ->where('status', 3)
            ->update(['is_billed' => 1]);

        return response()->json(['success' => true, 'message' => 'Approval successful for selected records!']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Database update failed!']);
    }
}

public function destroy($id)
{
    $landRecord = LandRecord::findOrFail($id);
    $landRecord->delete();

    return redirect()->back()->with('success', 'Irrigator deleted successfully.');
}

}
