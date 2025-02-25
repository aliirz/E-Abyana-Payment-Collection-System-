<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Crop(فصل)</h4>
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
                    <h4 class="font-weight-bold">Add Crop(فصل)</h4> <!-- Updated to reflect Employer data -->
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('AddCrop/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <!-- First Row (Crop Name) -->
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Crop(فصل)</label>
                                <input class="form-control form-control-lg" type="text" name="crop_name" required>
                            </div>
                        </div>
                       
                        <!-- Second Row (Crop Year) -->
                      
                    
                        <!-- Village Dropdown -->
                      
                    
                        <!-- Outlet Dropdown -->
                    
                    
                        <!-- Submit Button -->
                        <div class="form-group col-lg-12">
                            <button type="submit" class="btn btn-primary">Add Crop</button>
                        </div>
                    </form>
                    
                        
                        <!-- Submit Button -->
                       

                    
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card export-database">
                    <div class="card-header">
                        <h4>Table Crop(فصل)</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Crop76 Name(فصل)</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                       
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                       
                                    </tr>
                                   
                                   
                                 
                                    
                                    <tr>
                                        <td>4</td>
                                        <td>Marketing Designer</td>
                                        <td>San Francisco</td>
                                      
                                    </tr>
                                  
                                    
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div
    </section>
</div>
      
 <?php $__env->stopSection(); ?>





















              


 
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/RegionManagments/AddCrop.blade.php ENDPATH**/ ?>