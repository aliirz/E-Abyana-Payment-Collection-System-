<?php $__env->startSection('content'); ?>
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
    #example th{
        padding: 4px !important;
    }
</style>
</head>
<div class="app-content">

    <section class="section">

    <div class="row">
      <div class="col-md-12">
      <div class="card export-database">
      <div class="card-header">
      <h3><strong>Survey List</strong></h3>
      <p>Halqa ID: <?php echo e(session('halqa_id')); ?></p>
      </div>
      <div class="card-body">
      <div class="table-responsive">
      <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
        <thead class="table-primary text-center align-middle">
            <tr>
                <th rowspan="2" class="align-middle">ID</th>
                <th rowspan="2" class="align-middle">Irrigator Name</th>
                <th rowspan="2" class="align-middle">Khata No</th>
                <th rowspan="2" class="align-middle">Farmer Name</th>
                <th rowspan="2" class="align-middle">Final Crop</th>
                <th rowspan="2" class="align-middle">Rate</th>
                <th colspan="3" class="align-middle">Final Measurement</th>
                <th colspan="2" class="align-middle">Area</th>
                <th rowspan="2" class="align-middle">Action</th>
            </tr>
            <tr>
                <th class="align-middle">Date</th>
                <th class="align-middle">Length</th>
                <th class="align-middle">Width</th>
                <th class="align-middle">Marla</th>
                <th class="align-middle">Kanal</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $survey_get; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($survey->crop_survey_id); ?></td>
                        <td><?php echo e($survey->irrigator_name); ?></td>
                        <td><?php echo e($survey->irrigator_khata_number); ?></td>
                        <td><?php echo e($survey->cultivators_info); ?></td>
                        <td><?php echo e($survey->final_crop); ?></td>
                        <td><?php echo e($survey->crop_price); ?></td>
                        <td><?php echo e($survey->date); ?></td>
                        <td><?php echo e($survey->width); ?></td>
                        <td><?php echo e($survey->length); ?></td>
                        <td><?php echo e($survey->area_marla); ?></td>
                        <td><?php echo e($survey->area_kanal); ?></td>
                        <td class="align-middle text-center">
                         <a href="<?php echo e(url('survey/view')); ?>/<?php echo e($survey->crop_survey_id); ?>"><button class="btn btn-success btn-sm" title="View"><i class="fa fa-eye"></i></button></a>
                         <a href="<?php echo e(url('survey_bill/view')); ?>/<?php echo e($survey->irrigator_id); ?>"><button class="btn btn-primary btn-sm" title="Bill"><i class="fa fa-print"></i></button></a>

                           
                         <form
                         action="<?php echo e(route('landservey.destroy', $survey->crop_survey_id)); ?>"
                         method="POST"
                         onsubmit="return confirm('Are you sure you want to delete this irrigator?');"
                         style="display: inline;">
                         <?php echo csrf_field(); ?>
                         <?php echo method_field('DELETE'); ?>
                         <button class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                     </form>
                        </td>
                    </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
     <!-- <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
        <thead class="table-primary text-center align-middle">
            <tr>
                <th rowspan="3" class="align-middle">ID</th>
                <th rowspan="3" class="align-middle">Name</th>
                <th rowspan="3" class="align-middle">Khata No</th>
                <th colspan="3" class="align-middle">Crop Type Registration</th>
                <th rowspan="3" class="align-middle">Sowing Date</th>
                <th colspan="3" class="align-middle">Final Measurement</th>
                <th colspan="2" class="align-middle">Area</th>
                <th rowspan="3" class="align-middle">Action</th>
            </tr>
            <tr>
                <th colspan="2" class="align-middle">Land Assessment</th>
                <th rowspan="2" class="align-middle">Previous Crop Name</th>
                <th rowspan="2" class="align-middle">Date</th>
                <th rowspan="2" class="align-middle">Length</th>
                <th rowspan="2" class="align-middle">Width</th>
                <th rowspan="2" class="align-middle">Marla</th>
                <th rowspan="2" class="align-middle">Kanal</th>
            </tr>
            <tr>
                <th class="align-middle">Marla</th>
                <th class="align-middle">Kanal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="align-middle">1</td>
                <td class="align-middle">John Doe</td>
                <td class="align-middle">123456</td>
                <td class="align-middle">10</td>
                <td class="align-middle">2</td>
                <td class="align-middle">Wheat</td>
                <td class="align-middle">2024-01-01</td>
                <td class="align-middle">2024-06-01</td>
                <td class="align-middle">20</td>
                <td class="align-middle">10</td>
                <td class="align-middle">3</td>
                <td class="align-middle">1</td>
                <td class="align-middle">Edit/Delete</td>
            </tr>
        </tbody>
    </table> -->

      </div>
      </div>
      </div>
      </div>
    </div> 
</section>  
</div>    
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/abyana_new/abyana/resources/views/LandRecord/ListLandSurvey.blade.php ENDPATH**/ ?>