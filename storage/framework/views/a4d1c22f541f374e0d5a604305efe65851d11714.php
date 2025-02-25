<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">

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
                    <h4 class="font-weight-bold">Divsion/ڈویژن</h4> <!-- Updated to reflect Employer data -->
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('AddDivsion/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <!-- First Row (Name and CNIC) -->
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Name Divsion / نام ڈویژن</label>
                                <input class="form-control form-control-lg" type="text" name="divsion_name" required>
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
        <tbody>
            <?php $__currentLoopData = $divsions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divsion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><input type="checkbox" name="ids[]" value="<?php echo e($divsion->id); ?>"></td>
                <td><?php echo e($divsion->id); ?></td>
                <td><?php echo e($divsion->divsion_name); ?></td>
        
                <td>
                    <button class="btn btn-sm btn-primary badge" type="submit">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>

              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/RegionManagments/AddDivsion.blade.php ENDPATH**/ ?>