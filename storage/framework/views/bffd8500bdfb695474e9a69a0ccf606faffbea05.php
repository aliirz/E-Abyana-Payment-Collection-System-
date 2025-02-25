<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
</head>

    
    
<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Irrigator</h4>
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
                    <h4 class="font-weight-bold">Irrigator/</h4> <!-- Updated to reflect Employer data -->
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="<?php echo e(url('AddIrragtor/add')); ?>" method="POST">
                        <h5 class="font-weight-bold text-primary mt-3">Irrigator</h5>
                        <div class="row">
                         
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold for="div_id">Select Divsion/ڈویژن</label>
                                <select name="div_id" id="div_id" class="form-control" required onchange="get_districts(this)">
                                    <option class="form-label font-weight-bold value=">Choose Division/ڈویژن</option>
                                    <?php $__currentLoopData = $divsions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $divsion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($divsion->id); ?>"><?php echo e($divsion->divsion_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold" for="district_id">Select distric/ضلع</label>
                                <select name="district_id" id="district_id" class="form-control" required onchange="get_tehsils(this)">
                                    <option value="">Choose district</option>
                                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $district): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($district->id); ?>"><?php echo e($district->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>                                
                            </div>
                         
                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold" for="tehsil_id" style=" display: block;">Select Tehsil/تحصیل</label>
                                <select name="tehsil_id" id="tehsil_id" class="form-control form-control-lg" required onchange="get_halqa(this)">
                                    <option value="" style="font-weight: bold;">Choose Tehsil</option>
                                    <?php $__currentLoopData = $tehsils; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tehsil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tehsil->tehsil_id); ?>"><?php echo e($tehsil->tehsil_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-3">
                                <label class="form-label font-weight-bold" for="halqa_id">Select Halqa/حلقہ</label>
                                <select name="halqa_id" id="halqa_id" class="form-control form-control-lg" required style="font-size: 1.1rem; padding: 0.5rem 1rem; line-height: 1.5;">
                                    <option value="" style="font-weight: bold;">Choose Halqa/حلقہ</option>
                                    <?php $__currentLoopData = $Halqas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Halqa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($Halqa->id); ?>"><?php echo e($Halqa->halqa_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                           
                            
                          
                         
                          
                        </div>
                        <?php echo csrf_field(); ?>
                        
                        <!-- First Row (Name and CNIC) -->
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold" for="village_id">Select Village/گاؤں</label>
                                <select name="village_id" id="village_id" class="form-control" required>
                                    <option value="">Choose Village/گاؤں</option>
                                    <?php $__currentLoopData = $villages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $village): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($village->village_id); ?>"><?php echo e($village->village_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                        
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Name Irrigator</label>
                                <input class="form-control form-control-lg" type="text" name="irrigator_name" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Khata Number</label>
                                <input class="form-control form-control-lg" type="text" name="irrigator_khata_number" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <label class="form-label font-weight-bold">Mobile NUmber</label>
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
                        <h4>Irrigator/</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
                                                    <th>Irrigator Nam/</th>
                                                    <th>Khata Number</th>
                                                    <th>Mobile Number</th>
                                                    <th>Village Name</th>
                                                    <th>Halqa Name/حلقہ</th>
                                                    <th>Tehsil Name</th>
                                                    <th>District Name</th>
                                                    <th>Divsion</th>
        
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $Irrigators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Irrigator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><input type="checkbox" name="ids[]" value=""></td>
                                                    <td><?php echo e($Irrigator->id); ?></td>
                                                    <td><?php echo e($Irrigator->irrigator_name); ?></td>
                                                    <td><?php echo e($Irrigator->irrigator_khata_number); ?></td>
                                                    <td><?php echo e($Irrigator->irrigator_mobile_number); ?></td>
                                                    <td><?php echo e($Irrigator->village_name); ?></td>
                                                    <td><?php echo e($Irrigator->halqa_name); ?></td>
                                                    <td><?php echo e($Irrigator->tehsil_name); ?></td>
                                                    <td><?php echo e($Irrigator->district_name); ?></td>
                                                    <td><?php echo e($Irrigator->divsion_name); ?></td>
                                                    
                                                    <td class="text-center align-middle">
                                                        <div class="btn-group align-top">
                                                            <a
                                                                href="<?php echo e(url('LandRecord/LandRecord')); ?>/<?php echo e($Irrigator->id); ?>/<?php echo e($Irrigator->irrigator_khata_number); ?>"><button
                                                                    class="btn btn-sm btn-primary badge hover-button"
                                                                    data-target="#user-form-modal" data-toggle="modal"
                                                                    type="button">Add Survey</button></a>
                                                            <a
                                                                href=""><button
                                                                    class="btn btn-sm btn-primary badge"
                                                                    type="button"><i
                                                                        class="fa fa-trash"></i></button></a>
                                                        </div>
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
                </div>
            </div>
        </div
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
    function get_halqa(element) {
        var tehsilId = element.value; 
        console.log(tehsilId);

        if (tehsilId) {
          
            $.ajax({
                url: '/get-halqa/' + tehsilId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
    
                    $('#halqa_id').empty();
                    $('#halqa_id').append('<option value="">Choose Tehsil</option>');

                  
                    $.each(data, function (key, value) {
                        $('#halqa_id').append('<option value="' + value.halqa_id + '">' + value.halqa_name + '</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching tehsils:', error);
                }
            });
        } else {
           
            $('#halqa_id').empty();
            $('#halqa_id').append('<option value="">Choose Tehsil</option>');
        }
    }
</script>
<script>
 function get_village(element) {
    var halqaId = element.value; // Get the selected Halqa ID

    if (halqaId) {
        $.ajax({
            url: '/get-village/' + halqaId, // The route to fetch villages
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Clear the dropdown and add a placeholder option
                $('#village_id').empty();
                $('#village_id').append('<option value="">Choose Village/گاؤں</option>');

                // Populate dropdown with the fetched data
                $.each(data, function (key, value) {
                    $('#village_id').append(
                        '<option value="' + value.village_id + '">' + value.village_name + '</option>'
                    );
                });
            },
            error: function (xhr, status, error) {
                console.error('Error fetching villages:', error);
                alert('Failed to fetch villages. Please try again later.');
            },
        });
    } else {
        $('#village_id').empty();
        $('#village_id').append('<option value="">Choose Village/گاؤں</option>');
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/LaravelAdminTemplete-main-2/resources/views/AddIrragtor.blade.php ENDPATH**/ ?>