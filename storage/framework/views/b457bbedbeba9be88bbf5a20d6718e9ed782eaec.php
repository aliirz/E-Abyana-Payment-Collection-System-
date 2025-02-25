<?php $__env->startSection('content'); ?>
<head>
    ...
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<?php if(Session::has('success')): ?>
    <script>
        swal({
            title: "Success!",
            text: "<?php echo e(Session::get('success')); ?>",
            icon: "success",
            button: "OK",
        });
        
    </script>
<?php endif; ?>


<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">permission</h4>
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
                    <h4 class="font-weight-bold">Add Assign Roles</h4> <!-- Updated to reflect Employer data -->
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('AssignRoles_Permission/add')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        
                        <!-- First Row (Name and CNIC) -->
                        <div class="form-group col-lg-12">
                            <label  class="form-label font-weight-bold for="role_id">Select Assign Roles</label>
                            <select name="role_id" id="role_id" class="form-control" required>
                                <option class="form-label font-weight-bold value="">Choose Assign Roles</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
            
                        </div>
                       

                        <div class="row">
                            <?php $__currentLoopData = $Permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group col-lg-4">
                                    <label class="form-label font-weight-bold"><?php echo e($permission->name); ?></label>
                                    <input type="checkbox" name="name[]" value="<?php echo e($permission->id); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <h4>Table Roles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="districtDeleteForm" action="<?php echo e(route('district.delete')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                
                                <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            
                                            <th>Roles Name</th>
                                            <th>Permission</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                         
                                <ul>
                                    <?php $__currentLoopData = $assignedRoles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignedRole): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($assignedRole->id); ?></td>
                                        <td><?php echo e($assignedRole->role->name ?? 'No role assigned'); ?></td>
                                        <td><?php echo e($assignedRole->permission->name ?? 'No permission assigned'); ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary badge" type="button" onclick="confirmDelete(<?php echo e($assignedRole->id); ?>)">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                                              </ul>
                                        

                                </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>

    <?php if(Session::has('success')): ?>
        <script>
            swal({
                title: "Success!",
                text: "<?php echo e(Session::get('success')); ?>",
                icon: "success",
                button: "OK",
            });
            
        </script>
    <?php endif; ?>

    <script>
        function confirmDelete(districtId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This district cannot be deleted because it is associated with other records, such as tehsils. Please remove any linked records before attempting to delete this district.!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteDistrict(districtId);
                }
            });
        }
    
        function deleteDistrict(districtId) {
            fetch(`<?php echo e(route('district.delete')); ?>`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                body: JSON.stringify({
                    ids: { [districtId]: districtId }
                })
            }).then(response => {
                if (!response.ok) {
                    throw response;
                }
                return response.json();
            }).then(data => {
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: 'The district has been deleted.',
                    confirmButtonText: 'OK'
                }).then(() => {
                    location.reload();
                });
            }).catch(error => {
                error.json().then(errorData => {
                    if (errorData.errorCode === 1451) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Deletion Error',
                            text: errorData.error,
                            confirmButtonText: 'OK'
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An unexpected error occurred. Please try again.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        }
    </script>
    
    
    <script> <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</script>
</div>


              
 <?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/UserManagement/AssignRoles_Permission.blade.php ENDPATH**/ ?>