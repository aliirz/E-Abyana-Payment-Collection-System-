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
                    <form class="form-horizontal" action="<?php echo e(url('AddFarmer/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <!-- Farmer Details -->
                        <h5 class="font-weight-bold text-primary mt-3">Farmer Information</h5>
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label class="form-label">Select Village/ضلع</label>
                                <select name="village_id" class="form-control" required>
                                    <option value="">Select Village</option>
                                    <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($village->village_id); ?>"><?php echo e($village->village_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">plat_boundary_number/ نمبر شمار</label>
                                <input type="text" class="form-control" name="plat_boundary_number" placeholder="Enter plat_boundary_number">
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">Select Division/تحصیل</label>
                                <select name="division_id" class="form-control" required>
                                    <option value="">Choose Division</option>
                                    <?php $__currentLoopData = $divsions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divsion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($divsion->division_id); ?>"><?php echo e($divsion->divsion_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">Select District/ضلع</label>
                                <select name="district_id" id="district_id" class="form-control" required>
                                    <option class="form-label font-weight-bold >Choose District/ضلع</option>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">SelectCanal/نہر </label>
                                <select name="canal_id" id="canal_id" class="form-control" required>
                                    <option class="form-label font-weight-bold >Choose District/ضلع</option>
                                   <?php $__currentLoopData = $canals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option value="<?php echo e($canal->canal_id); ?>"><?php echo e($canal->canal_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label class="form-label">Crop/فصل</label>
                                <select name="crop_id" id="crop_id" class="form-control" required>
                                    <option class="form-label font-weight-bold" value="">Choose District/ضلع</option>
                                    <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($crop->crop_id); ?>"><?php echo e($crop->crop_name); ?></option> <!-- Ensure you're using the correct field names -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                             <div class="col-md-2 form-group">
                                <label class="form-label">Select Tehsil/تحصیل</label>
                                <select name="crop_id" id="crop_id" class="form-control" required>
                                    <option value="">Choose Crop/فصل</option>
                                    <?php $__currentLoopData = $crops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($crop->crop_id); ?>"><?php echo e($crop->crop_year); ?></option> <!-- Ensure you're using the correct field name -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label class="form-label">Outlet/موگیہ</label>
                                <select name="crop_id" id="crop_id" class="form-control" required>
                                    <option value="">Choose Crop/فصل</option>
                                    <?php $__currentLoopData = $Outlets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($Outlet->outlet_id); ?>"><?php echo e($Outlet->outlet_name); ?></option> <!-- Ensure you're using the correct field name -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                                <label class="form-label font-weight-bold">Water Outlet/توڑ جھلار</label>
                                <input type="text" class="form-control" placeholder="Serial Number / نمبر شمار" name="serial_number">
                            </div>
                        </div>
                        
                        <!-- Canal Information -->
                        <h5 class="font-weight-bold text-primary mt-3">Farmer & land Registration Form</h5>
                        <div class="form-group row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(1)</span> Serial Number / نمبر شمار</label>
                                <input type="text" class="form-control" placeholder="Serial Number / نمبر شمار" name="serial_number">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(2)</span> Entry Date/تاریخ اندراج</label>
                                <input type="date" class="form-control" placeholder="Entry Date/تاریخ اندراج" name="registration_date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(3)</span>Assessment_number/نمبر کھاتہ(کھتونی)  </label>
                                <input type="text" class="form-control" placeholder="Account Number/نمبر کھاتہ(کھتونی)  " name="assessment_number">
                            </div>
                        </div>

                        <!-- Land Details -->
                    
                        <div class="form-group row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(4)</span>Khasra Assessment Number/نمبر خسرہ بندوبست</label>
                                <input type="text" class="form-control" placeholder="Khasra Assessment Number/نمبر خسرہ بندوبست" name="khasra_number">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(5)</span>Patwari Name/پٹواری </label>
                                <input type="text" class="form-control" placeholder="Patwari Name/پٹواری" name="patwari_name">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label"><span>(6)</span>Owner Name/نام مالک بقید ولدیت و قومیت </label>
                                <input type="text" class="form-control" placeholder="Owner Name/نام مالک بقید ولدیت و قومیت " name="owner_name">
                            </div>
                        </div>
                     
                     <div class="form-group row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><span>(7)</span>Tenant Name / نام مالگزار بقید ولدیت  
                            </label>
                            <input type="text" class="form-control" placeholder="Tenant Name/نام مالگزار بقید ولدیت  " name="tenant_name">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><span>(8)</span>Cultivator's/ نام کاشتکار بقید ولدیت وقومیت وسکونت  
                            </label>
                            <input type="text" class="form-control" placeholder="Cultivator's Information / نام کاشتکار بقید ولدیت وقومیت وسکونت  
                            " name="cultivators_info">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><span>(9)</span> Previous Crop Type / نام جنس جو پہلے بوئی گئی بمعہ درجہ</label>
                                <input type="text" class="form-control" placeholder="Previous Crop Type / نام جنس جو پہلے بوئی گئی بمعہ درجہ" name="previous_crop">
                            </div>
                        </div>
                    </div>
                    <h5 class="font-weight-bold text-primary mt-3">Farmer & land Registration Form</h5>
                    <div class="form-group row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><span>(10)</span>Land Assessment/اراضی تخمینہ  
                            </label>
                            <input type="text" class="form-control" placeholder="Marla/مرلہ  
                            " name="marla">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label"><span>(11)</span>Land Assessment / اراضی تخمینہ  
                        </label>
                        <input type="text" class="form-control" placeholder="Kanal/کنال  " name="kanal">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label"><span>(12)</span> Sowing Date / تاریخ تخمریزی</label>
                                <input type="date" class="form-control" placeholder="Sowing Date / تاریخ تخمریزی" name="snowing_date">
                            </div>
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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/FarmerInformation/AddFarmer.blade.php ENDPATH**/ ?>