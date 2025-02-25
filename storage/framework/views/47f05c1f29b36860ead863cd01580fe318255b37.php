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
       
        <!--page-header closed-->

        <!--row open-->
  

 <div id="simpleModal" class="fixed  inset-0 bg-gray-400 bg-opacity-50 flex z-50 items-center justify-center hidden">
  
    <div class="card shadow-sm w-[40vw]">
        <div class="card-header bg-primary flex justify-between text-white">
            <h4 class="font-weight-bold">Add new Outlet</h4> <!-- Updated to reflect Employer data -->

            <button onclick="closeModal()" type="button"
                class="bg-white text-black h-[30px] w-[30px] rounded-[50px]" data-target="#exampleModalCenter">
                <i class="fa fa-close"></i></button>
        </div>
        <div class="card-body">

            <form class="form-horizontal" action="<?php echo e(url('CanalOutlet/add')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                     
                <div class="form-group col-lg-12">
                    <label  class="form-label font-weight-bold" for="canal_id">Select Canal/ضلع</label>
                    <select name="canal_id" id="village_id" class="form-control" required>
                        <option value="">Choose Canal/گاؤں</option>
                        <?php $__currentLoopData = $canals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $canal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($canal->id); ?>"><?php echo e($canal->canal_name); ?> / <?php echo e($canal->id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    
    
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="form-label font-weight-bold">Add  Outlet/نہر کا مخرج</label>
                        <input class="form-control form-control-lg" type="text" name="outlet_name" required>
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
 <div class="card-header d-flex justify-content-between">
    <h4><strong>Outlet List</strong></h4>
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
                    <th>Outlet Name</th>
                    <th>Village Name</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                 <?php $__currentLoopData = $outlets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $outlet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($outlet->id); ?></td>
                    <td><?php echo e($outlet->outlet_name); ?></td>
                    <td><?php echo e($outlet->canal->canal_name); ?></td> 
                    <td>
                        <button class="btn btn-sm btn-primary badge" type="submit">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody>
        </table>
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
            fetch(<?php echo e(route('district.delete')); ?>, {
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/abyana_new/resources/views/RegionManagments/CanalOutlet.blade.php ENDPATH**/ ?>