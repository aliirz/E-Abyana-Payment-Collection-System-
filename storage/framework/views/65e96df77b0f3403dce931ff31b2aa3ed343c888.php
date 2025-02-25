<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Village(موضع)</h4>
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
                    <h4 class="font-weight-bold">Add Village/موضع</h4> 
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('AddVillage/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <div class="form-group col-lg-12">
                            <label class="form-label font-weight-bold" for="tehsil_id" style="font-size: 1.2rem; display: block;">Select Tehsil/تحصیل</label>
                            <select name="tehsil_id" id="tehsil_id" class="form-control form-control-lg" required style="font-size: 1.1rem; padding: 0.5rem 1rem; line-height: 1.5;">
                                <option value="" style="font-weight: bold;">Choose Tehsil/تحصیل</option>
                                <?php $__currentLoopData = $tehsils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tehsil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tehsil->tehsil_id); ?>"><?php echo e($tehsil->tehsil_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-12">
                            <label class="form-label font-weight-bold" for="halqa_id" style="">Select Halqa/حلقہ</label>
                            <select name="halqa_id" id="halqa_id" class="form-control form-control-lg" required style="font-size: 1.1rem; padding: 0.5rem 1rem; line-height: 1.5;">
                                <option value="" style="font-weight: bold;">Choose Halqa/حلقہ</option>
                                <?php $__currentLoopData = $Halqas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Halqa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($Halqa->id); ?>"><?php echo e($Halqa->halqa_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold" style="font-size: 1.1rem;">Name Village/نام موضع</label>
                                <input class="form-control form-control-lg" type="text" name="village_name" required style="font-size: 1rem;">
                            </div>
                            
                         
                        </div>
                        
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
                        <h4>Table Village</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="<?php echo e(route('tehsil.delete')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                
                                  <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>#</th>
                                            <th>Village Name/حلقہ</th>
                                            <th>Tehsil Name</th>
                                            <th>District Name</th>
                                            <th>Divsion</th>
                                         

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><input type="checkbox" name="ids[]" value=""></td>
                                            <td><?php echo e($village->village_id); ?></td>
                                            <td><?php echo e($village->village_name); ?></td>
                                            <td><?php echo e($village->tehsil_name); ?></td>
                                            <td><?php echo e($village->district_name); ?></td>
                                            <td><?php echo e($village->divsion_name); ?></td>
                                            
                                     
                                            <td>
                                                <button class="btn btn-sm btn-primary badge" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </fle>
                        </div>
                    </div>
                </div>
            </div>
        </div
    </section>
</div>


              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/RegionManagments/AddVillage.blade.php ENDPATH**/ ?>