<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
  å
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Divsion/ڈویژن</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12" style="margin-top: 80px;">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="font-weight-bold">Land Record</h4> <!-- Updated to reflect Employer data -->
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('AddIrragtor/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <!-- First Row (Name and CNIC) -->
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">1. Khasra Assessment Number / نمبر خسرہ بندوبست  
                                </label>
                                <input class="form-control form-control-lg" type="text" name="irrigator_name" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label  class="form-label font-weight-bold for="village_id">Select Village/ضلع</label>
                                <select name="village_id" id="village_id" class="form-control" required>
                                    <option value="">Choose Village/گاؤں</option>
                                    <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($village->village_id); ?>"><?php echo e($village->village_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                
                            </div>
                            <div class="form-group col-lg-12">
                                <label  class="form-label font-weight-bold for="id">Select Irrigator</label>
                                <select name="id" id="id" class="form-control" required>
                                    <option value="">Choose Irrigator</option>
                                    <?php $__currentLoopData = $Irrigators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Irrigator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($Irrigator->id); ?>"><?php echo e($Irrigator->irrigator_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">3. Tenant Name / نام مالگزار بقید ولدیت  
                                </label>
                                <input class="form-control form-control-lg" type="text" name="irrigator_mobile_number" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">4. Cultivator's Information / نام کاشتکار بقید ولدیت وقومیت وسکونت
                                </label>
                                <input class="form-control form-control-lg" type="text" name="irrigator_mobile_number" required>
                            </div>
                        </div>
                       
                       
                        
                        <!-- Second Row (Skills) -->
                      
                        
                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>

                    </form>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Divsion/ڈویژن</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div
    </section>
</div>


              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/LandRecord.blade.php ENDPATH**/ ?>