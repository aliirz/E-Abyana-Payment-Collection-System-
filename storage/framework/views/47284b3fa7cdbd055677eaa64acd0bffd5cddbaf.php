<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">

    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold"></h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-light-color"></a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </div>
        <!--page-header closed-->

        <!--row open-->
       

<div id="simpleModal" class="fixed  inset-0 bg-gray-400 bg-opacity-50 flex z-50 items-center justify-center hidden">
  
    <div class="card shadow-sm w-[40vw]">
        <div class="card-header bg-primary flex justify-between text-white">
            <h4 class="font-weight-bold">Add Divsion</h4> <!-- Updated to reflect Employer data -->

            <button onclick="closeModal()" type="button"
                class="bg-white text-black h-[30px] w-[30px] rounded-[50px]" data-target="#exampleModalCenter">
                <i class="fa fa-close"></i></button>
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

<div class="row">
    <div class="col-md-12">
        <div class="card export-database">
            <div class="card-header d-flex justify-content-between">
                <h4><strong>Irrigators List</strong></h4>
                <button onclick="openModal()" type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    <i class="fa fa-plus"></i> </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                        <thead>
                            <tr>
                                <th>#</th>
                           
                                <th>Divsion Name</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $divsions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divsion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                             
                                <td><?php echo e($divsion->id); ?></td>
                                <td><?php echo e($divsion->divsion_name); ?></td>
                                <td>
                                    <form
                                    action="<?php echo e(route('AddDivsion.destroy', $divsion->id)); ?>"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this irrigator?');"
                                    style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                
    
                                            <button class="btn btn-sm btn-primary badge rounded-pill" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
    
                                </form>
                                </td>
                            
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div

              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\durshal_cfp\abyana\resources\views/RegionManagments/AddDivsion.blade.php ENDPATH**/ ?>