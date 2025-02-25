<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegionAdministration\DistrictController;
use App\Http\Controllers\RegionAdministration\CropController;
use App\Http\Controllers\RegionAdministration\VollageController;
use App\Http\Controllers\RegionAdministration\TahsilController;
use App\Http\Controllers\RegionAdministration\CanalController;
use App\Http\Controllers\RegionAdministration\DivsionController;
use App\Http\Controllers\RegionAdministration\CanalOutLet;
use App\Http\Controllers\FarmerInfo\FarmerController;
use App\Http\Controllers\Login;
use App\Http\Controllers\DemandController;
use App\Http\Controllers\RulesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AssignRController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegionAdministration\HalqaController;
use App\Http\Controllers\RegionAdministration\PriceController;
use App\Http\Controllers\RegionAdministration\ControllerPatwari;
use App\Http\Controllers\IrrigatorController;
use App\Http\Controllers\FarmerLandRecord;
use App\Http\Controllers\LogoutController;

// Public routes (Login & Logout)
Route::get('/login', [Login::class, 'index'])->name('login');
Route::post('/signin', [Login::class, 'make_login'])->name('signin');
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

// Grouping protected routes
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/table', function () {
        return view('table');
    });

    Route::get('/datatables', function () {
        return view('datatables');
    });

    Route::get('/users', function () {
        return view('userlist');
    });

    Route::get('/register', function () {
        return view('register');
    });

    Route::get('/form', function () {
        return view('form');
    });

    Route::get('/formadvance', function () {
        return view('formadvance');
    });

    Route::get('/profile', function () {
        return view('profile');
    });

    // Your existing protected routes
    Route::get('AddDistrict', [DistrictController::class, 'AddDistrict'])->name('AddDistrict');
    Route::post('AddDistrict/add', [DistrictController::class, 'StoreDistrict'])->name('AddDistrict.add');
    Route::delete('deletedistrict', [DistrictController::class, 'delete'])->name('district.delete');

    Route::delete('districts/delete', [DistrictController::class, 'deleteMultiple'])->name('districts.delete');
    Route::delete('tehsil/delete', [TahsilController::class, 'deletetehsil'])->name('tehsil.delete');
    Route::post('CanalOutlet/add', [CanalOutLet::class, 'storeOutlet'])->name('CanalOutlet/add');
    Route::get('AddVillage', [VollageController::class, 'AddVillage'])->name('AddVillage');
    Route::post('AddVillage/add', [VollageController::class, 'StoreVillage'])->name('AddVillage/add');

    Route::get('AddCrop', [CropController::class, 'AddCrop'])->name('AddCrop');
    Route::post('AddCrop/add', [CropController::class, 'storeCrop'])->name('AddCrop/add');
    Route::post('Addprice/add', [PriceController::class, 'Storeprice'])->name('Addprice/add');
    Route::get('AddTahsil', [TahsilController::class, 'AddTahsil'])->name('AddTahsil');
    Route::post('AddTahsil/add', [TahsilController::class, 'StoreTehsil'])->name('AddTahsil/add');

    Route::get('AddCanal', [CanalController::class, 'AddCanal'])->name('AddCanal');
    Route::post('AddCanal/add', [CanalController::class, 'storecanal'])->name('AddCanal/add');
    Route::get('CanalOutlet', [CanalOutLet::class, 'AddOutlet'])->name('CanalOutlet');
    Route::get('AddDivsion', [DivsionController::class, 'AddDivsion'])->name('AddDivsion');
    Route::post('AddDivsion/add', [DivsionController::class, 'StoreDivsion'])->name('AddDivsion/add');

    Route::get('AddFarmer', [FarmerController::class, 'AddFarmer'])->name('AddFarmer');
    Route::post('AddFarmer/add', [FarmerController::class, 'storeFarmer'])->name('AddFarmer.add');

    Route::get('AddRoles', [RulesController::class, 'Add'])->name('AddRoles');
    Route::post('AddRoles/add', [RulesController::class, 'storeRoles'])->name('AddRoles.add');
    Route::get('Addprice', [PriceController::class, 'Addprice'])->name('Addprice');
    Route::get('AddPermission', [PermissionController::class, 'AddPermission']);
    Route::post('AddPermission/add', [PermissionController::class, 'storepermission'])->name('AddPermission.add');

    Route::get('AssignRoles_Permission', [AssignRController::class, 'AddAssignRoles']);
    Route::post('AssignRoles_Permission/add', [AssignRController::class, 'storeAssignRoles'])->name('AssignRoles_Permission.add');

    Route::get('AddUser', [UserController::class, 'AddUser']);
    Route::post('AddUser/add', [UserController::class, 'storeUser'])->name('AddUser.add');

    Route::get('AddHalqa', [HalqaController::class, 'Addhalqa'])->name('AddHalqa');
    Route::post('AddHalqa/add', [HalqaController::class, 'storeHalqa'])->name('AddHalqa.add');

    Route::get('AddPatwari', [ControllerPatwari::class, 'AddPatwari']);

  
  
    Route::get('AddIrragtor', [IrrigatorController::class, 'AddIrrigator'])->name('AddIrragtor');
    Route::post('/AddIrragtor/add', [IrrigatorController::class, 'StoreIrrgator'])->name('AddIrragtor.add');
    Route::get('ListIrrigator', [IrrigatorController::class, 'ListIrrigator']);

    
    Route::get('ListIrrigator', [IrrigatorController::class, 'ListIrrigator']);
    Route::get('ListBills', [FarmerLandRecord::class, 'ListBills'])->name('');

    Route::get('/get-outlets/{canal_id}', [FarmerLandRecord::class, 'get_outlet']);
    Route::get('/get-districts/{divisionId}', [FarmerLandRecord::class, 'FarmerDistricts']);
    Route::get('/get-tehsils/{districtId}', [FarmerLandRecord::class, 'FarmerTehsils']);
    Route::get('ListIrrigator', [IrrigatorController::class, 'ListIrrigator']);
    
    Route::get('LandRecord/LandRecord/{id}/{abs}/{village_id}/{canal_id}', [FarmerLandRecord::class, 'LandRecord'])->name('LandRecord.ListLandSurvey');

    Route::post('LandRecord/add', [FarmerLandRecord::class, 'storeFarmer'])->name('LandRecord.add');
    
    Route::get('ListLandSurvey', [FarmerLandRecord::class, 'LandSurvey'])->name('ListLandSurvey');;
    Route::get('ListBills', [FarmerLandRecord::class, 'ListBills']);
    Route::get('ListLandSurveyZilladar', [FarmerLandRecord::class, 'LandSurveyZilladar'])->name('ListLandSurveyZilladar');
    Route::get('ListLandSurveyCollector', [FarmerLandRecord::class, 'LandSurveyCollector'])->name('ListLandSurveyCollector');
    Route::get('survey/view/{id}', [FarmerLandRecord::class, 'surveyView']);
    Route::get('survey/forward/{id}', [FarmerLandRecord::class, 'surveyViewForward']);
    Route::get('survey/reverse/{id}', [FarmerLandRecord::class, 'surveyViewReverse']);
    Route::get('survey/collector/forward/{id}', [FarmerLandRecord::class, 'surveyViewForwardCollector']);
    Route::get('survey/collector/reverse/{id}', [FarmerLandRecord::class, 'surveyViewReverseCollector']);
    Route::get('survey/patwari/forward/{id}', [FarmerLandRecord::class, 'surveyViewForwardPatwari']);
    Route::post('surveyReview/forward/{crop_survey_id}', [FarmerLandRecord::class, 'surveyReviewForward']);
    Route::post('surveyReview/reverse/{crop_survey_id}', [FarmerLandRecord::class, 'surveyReviewReverse']);
    Route::post('surveyReview/forward/collector/{crop_survey_id}', [FarmerLandRecord::class, 'surveyReviewForwardCollector']);
    Route::post('surveyReview/reverse/collector/{crop_survey_id}', [FarmerLandRecord::class, 'surveyReviewReverseCollector']);
    Route::post('surveyReview/forward/patwari/{crop_survey_id}', [FarmerLandRecord::class, 'surveyReviewForwardPatwari']);
    Route::get('survey_bill/view/{id}', [FarmerLandRecord::class, 'surveyBillView']);
    Route::get('survey_bill/approve/view/{id}', [FarmerLandRecord::class, 'surveyBillApprovalView']);
    Route::get('survey_bill/approve/{irrigator_id}', [FarmerLandRecord::class, 'surveyApproved']);
    Route::post('survey_bill/approve_multiple', [FarmerLandRecord::class, 'surveyApproveMultiple'])->name('survey_bill.approve_multiple');
    Route::post('survey_bill/view_multiple', [FarmerLandRecord::class, 'surveyBillMultiple'])->name('survey_bill.view_multiple');
    Route::get('ListIrrigatorsForApprovals', [FarmerLandRecord::class, 'IrrigatorsForApproval'])->name('ListIrrigatorsForApprovals');
    Route::get('ListIrrigatorsForBills', [FarmerLandRecord::class, 'IrrigatorsForBills']);
    Route::delete('/landservey/{id}', [FarmerLandRecord::class, 'destroy'])->name('landservey.destroy');
    Route::delete('/AddUser/{id}', [UserController::class, 'destroy'])->name('AddUser.destroy');
    Route::delete('/AddDivsion/{id}', [DivsionController::class, 'destroy'])->name('AddDivsion.destroy');
    Route::delete('/irrigators/{id}', [IrrigatorController::class, 'destroy'])->name('irrigators.destroy');
    Route::get('/get-districts/{divisionId}', [IrrigatorController::class, 'Districts']);
    Route::get('/get-canals/{villageID}', [IrrigatorController::class, 'Canals']);
    Route::get('/get-tehsils/{districtId}', [IrrigatorController::class, 'Tehsils']);
    Route::get('/get-halqa/{tehsilId}', [IrrigatorController::class, 'Halqa']);
    Route::get('/halqa_for_users/{tehsilId}', [UserController::class, 'Halqa']);
    Route::get('/get-districts/{divisionId}', [FarmerLandRecord::class, 'FarmerDistricts']);
    Route::get('/get-tehsils/{districtId}', [FarmerLandRecord::class, 'FarmerTehsils']);
    Route::get('/get-village/{halqaId}', [IrrigatorController::class, 'Village']);
    Route::get('/get-tehsils/{districtId}', [HalqaController::class, 'getTehsils']);
    Route::get('/get-outlets/{canal_id}', [FarmerLandRecord::class, 'get_outlet']);
    Route::get('edit-irrigator/{id}',[IrrigatorController::class,'editIrrigator'])->name('edit.irrigator');
Route::put('/irrigators/{id}', [IrrigatorController::class, 'update'])->name('update.irrigator');


});
