<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<div class="app-content">
    <section class="section">
        <!-- Page Header -->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Irrigation System - Farmer & Land Details</h4>
        </div>
        
        <!-- Form Card -->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="font-weight-bold">Land Survey/خسرہ گرداوری</h4>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('LandRecord/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Farmer Details -->
                        <h5 class="font-weight-bold text-primary mt-3">Land Survey/خسرہ گرداوری</h5>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold for="div_id">Select Divsion/ڈویژن</label>
                                <select  id="div_id" class="form-control" required onchange="get_districts(this)">
                                    <option class="form-label font-weight-bold value=">Choose Division/ڈویژن</option>
                                    <?php $__currentLoopData = $divsions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divsion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($divsion->id); ?>"><?php echo e($divsion->divsion_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold" for="district_id">Select distric/ضلع</label>
                                <select id="district_id" class="form-control" required onchange="get_tehsils(this)">
                                    <option value="">Choose district</option>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>                                
                            </div>
                         
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold" for="tehsil_id" style=" display: block;">Select Tehsil/تحصیل</label>
                                <select id="tehsil_id" class="form-control form-control-lg" required onchange="get_halqa(this)">
                                    <option value="" style="font-weight: bold;">Choose Tehsil</option>
                                    <?php $__currentLoopData = $tehsils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tehsil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tehsil->tehsil_id); ?>"><?php echo e($tehsil->tehsil_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold" for="halqa_id" style="">Select Halqa/حلقہ</label>
                                <select id="halqa_id" class="form-control form-control-lg" required style="font-size: 1.1rem; padding: 0.5rem 1rem; line-height: 1.5;">
                                    <option value="" style="font-weight: bold;">Choose Halqa/حلقہ</option>
                                    <?php $__currentLoopData = $Halqas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Halqa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($Halqa->id); ?>"><?php echo e($Halqa->halqa_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">Select Village/ضلع</label>
                                <select name="village_id" class="form-control" required>
                                    <option value="">Select Village</option>
                                    <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($village->village_id); ?>"><?php echo e($village->village_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label">Select canal/ضلع</label>
                                <select name="canal_id" class="form-control" required>
                                    <option value="">Select Village</option>
                                    <?php $__currentLoopData = $canals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($canal->id); ?>"><?php echo e($canal->canal_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label">Outlet/موگیہ</label>
                                <select name="outlet_id" id="outlet_id" class="form-control" required>
                                    <option value="">Choose Outlet</option>
                                    <?php $__currentLoopData = $Outlets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Outlet->id); ?>"><?php echo e($Outlet->outlet_name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                       
                            <div class="col-md-2 mb-2">
                                <label class="form-label">Session crop/</label>
                                <input type="date" class="form-control" placeholder="Session crop" name="session_date">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">Crop/فصل</label>
                                <select name="crop_id" id="crop_id" class="form-control" required>
                                    <option class="form-label font-weight-bold" value="">Choose Crop/فصل</option>
                                    <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($crop->id); ?>"><?php echo e($crop->crop_name); ?></option> <!-- Ensure you're using the correct field names -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                         
                       
                     
                        </div>
                        
                        <!-- Canal Information -->
                        <h5 class="font-weight-bold text-primary mt-3">Farmer & land Registration Form</h5>
                        <div class="form-group row">
                            <div class="col-md-4 mb-2">
                                <label class="form-label"><span>(1)</span>Khasra Assessment Number/نمبر خسرہ بندوبست</label>
                                <input type="text" class="form-control" placeholder="Khasra Assessment Number/نمبر خسرہ بندوبست" name="khasra_number">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label"><span>(1)</span>Irrigator Khata Number</label>
                                <input type="text" class="form-control" placeholder="Khata Number" name="irrigator_khata_number" value="<?php echo e($survey->irrigator_khata_number); ?>">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label"><span>(1)</span>Name Irrigator</label>
                                <input type="text" class="form-control" placeholder="Khasra Assessment Number/نمبر خسرہ بندوبست" name="irrigator_name" value="<?php echo e($survey->irrigator_name); ?>">
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="form-label"><span>(1)</span>irrigator_Id</label>
                                <input type="text" class="form-control" placeholder="" name="irrigator_id" value="<?php echo e($survey->id); ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(2)</span>Tenant Name / نام مالگزار بقید ولدیت  
                                </label>
                                <input type="text" class="form-control" placeholder="Tenant Name/نام مالگزار بقید ولدیت  " name="tenant_name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(3)</span>Entry Date/تاریخ اندراج</label>
                                <input type="date" class="form-control" placeholder="Entry Date/تاریخ اندراج " name="registration_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>()</span>Cultivator's/ نام کاشتکار بقید ولدیت وقومیت وسکونت  
                                </label>
                                <input type="text" class="form-control" placeholder="Cultivator's Information / نام کاشتکار بقید ولدیت وقومیت وسکونت  
                                " name="cultivators_info">
                            </div>
                            <div class="col-md-6 mb-6">
                            <label class="form-label"><span>(12)</span> Sowing Date / تاریخ تخمریزی</label>
                            <input type="date" class="form-control" placeholder="Sowing Date / تاریخ تخمریزی" name="snowing_date">
                        </div>
                        </div>
                        <h5 class="font-weight-bold text-primary mt-3">Crop Type Registration/انداراج جنس شدکار
                        </h5>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(10)</span>Land Assessment/اراضی تخمینہ  
                                </label>
                                <input type="text" class="form-control" placeholder="Marla/مرلہ  
                                " name="land_assessment_marla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(11)</span>Land Assessment / اراضی تخمینہ  
                            </label>
                            <input type="text" class="form-control" placeholder="Kanal/کنال  " name="land_assessment_kanal">
                            </div>
   
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mb-12">
                                <label class="form-label"><span>(12)</span> Previous Crop Name with Grade / نام جنس جو پہلے بوئی گئی بمعہ درجہ</label>
                                <input type="text" class="form-control" placeholder="Sowing Date / تاریخ تخمریزی" name="previous_crop">
                            </div>
                        </div>
                        <h5 class="font-weight-bold text-primary mt-3">Final Measurement/پیمائش پختہ
                        </h5>
                        <div class="form-group row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(4)</span>Date/تاریخ  
                                </label>
                                <input type="date" class="form-control" placeholder="Date/تاریخ" name="date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(7)</span>Length/طول  
 
                                </label>
                                <input type="text" class="form-control" placeholder="Length/طول  
                                " name="length">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(6)</span>Width/عرض  </label>
                                <input type="text" class="form-control" placeholder="Width/عرض" name="width">
                            </div>
                        </div>
                        <h5 class="font-weight-bold text-primary mt-3">Area/رقبہ

                        </h5>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(10)</span>Marla/مرلہ    
                                </label>
                                <input type="text" class="form-control" placeholder="Marla/مرلہ    

                                " name="area_marla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(11)</span> Kanal/کنال  
                            </label>
                            <input type="text" class="form-control" placeholder="Kanal/کنال  " name="area_kanal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 form-group">
                                <label class="form-label">Crop/فصل</label>
                                <select name="finalcrop_id" id="finalcrop_id" class="form-control" required>
                                    <option class="form-label font-weight-bold" value="">Choose Crop/فصل</option>
                                    <?php $__currentLoopData = $cropprice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($crop->id); ?>"><?php echo e($crop->final_crop); ?></option> <!-- Ensure you're using the correct field names -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label">price</label>
                                <select name="crop_price" id="crop_price" class="form-control" required>
                                    <option class="form-label font-weight-bold" value="">Choose Crop/فصل</option>
                                    <?php $__currentLoopData = $cropprice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $price): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($price->id); ?>"><?php echo e($crop->crop_price); ?></option> <!-- Ensure you're using the correct field names -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- Land Details -->
                    
                        <h5 class="font-weight-bold text-primary mt-3">Land Replanting/اراضی دوبارہ کاشت


                        </h5>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(10)</span>Marla/مرلہ    
                                </label>
                                <input type="text" class="form-control" placeholder="Marla/مرلہ    

                                " name="replanting_marla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(11)</span>Kanal/کنال  
                            </label>
                            <input type="text" class="form-control" placeholder="Kanal/کنال  " name="replanting_kanal">
                            </div>
                        </div>
                        <h5 class="font-weight-bold text-primary mt-3">Double Crop Land/اراضی دو فصلی



                        </h5>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(10)</span>Marla/مرلہ    
                                </label>
                                <input type="text" class="form-control" placeholder="Marla/مرلہ    

                                "name="double_crop_marla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(11)</span>Kanal/کنال  
                            </label>
                            <input type="text" class="form-control" placeholder="Kanal/کنال  "name="double_crop_kanal">
                            </div>
                        </div>
                        <h5 class="font-weight-bold text-primary mt-3">Irrigated Area / مجرائی رقبہ




                        </h5>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(10)</span>Marla/مرلہ    
                                </label>
                                <input type="text" class="form-control" placeholder="Marla/مرلہ    

                                "name="irrigated_area_marla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(11)</span>Kanal/کنال  
                            </label>
                            <input type="text" class="form-control" placeholder="Kanal/کنال" name="irrigated_area_kanal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(10)</span>Identifabl Area Marla 
                                </label>
                                <input type="text" class="form-control" placeholder="Marla/مرلہ    

                                "name="identifable_area_marla">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label"><span>(11)</span>Identifabl Area Kanal
                            </label>
                            <input type="text" class="form-control" placeholder="Kanal/کنال" name="identifable_area_kanal">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 mb-12">
                                <label class="form-label"><span>(12)</span>Land Quality/کیفیت
                                </label>
                                <input type="text" class="form-control" placeholder="Land Quality/کیفیت" name="land_quality">
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $__env->stopSection(); ?>
<script>
    function get_districts(element) {
        var divisionId = element.value; // Get the selected value

        if (divisionId) {
            // Make an AJAX request to fetch districts based on the selected division
            $.ajax({
                url: '/get-districts/' + divisionId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Clear the district dropdown and add a placeholder option
                    $('#district_id').empty();
                    $('#district_id').append('<option value="">Choose District</option>');

                    // Populate the district dropdown with the data received
                    $.each(data, function (key, value) {
                        $('#district_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching districts:', error);
                }
            });
        } else {
            // Reset the district dropdown if no division is selected
            $('#district_id').empty();
            $('#district_id').append('<option value="">Choose District</option>');
        }
    }
</script>
<script>
    function get_tehsils(element) {
        var districtId = element.value; 
        console.log(districtId);
    
        if (districtId) {
            // Make an AJAX request to fetch tehsils based on the selected district
            $.ajax({
                url: '/get-tehsils/' + districtId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Clear the Tehsil dropdown and add a placeholder option
                    $('#tehsil_id').empty();
                    $('#tehsil_id').append('<option value="">Choose Tehsil</option>');
    
                    // Populate the Tehsil dropdown with the received data
                    $.each(data, function (key, value) {
                        $('#tehsil_id').append('<option value="' + value.tehsil_id + '">' + value.tehsil_name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching tehsils:', error);
                }
            });
        } else {
            // Reset the Tehsil dropdown if no district is selected
            $('#tehsil_id').empty();
            $('#tehsil_id').append('<option value="">Choose Tehsil</option>');
        }
    }
    </script>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/LandRecord/LandRecord.blade.php ENDPATH**/ ?>