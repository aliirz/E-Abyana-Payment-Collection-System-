@extends('layout')

@section('content')


@if(Session::has('success'))
    <script>
        swal({
            title: "Success!",
            text: "{{ Session::get('success') }}",
            icon: "success",
            button: "OK",
        });
        
    </script>
@endif


<div class="app-content">
  
    <section class="section">
        <!--page-header open-->
        <div class="page-header pt-0">
            <h4 class="page-title font-weight-bold">Halqa/حلقہ</h4>
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
            <h4 class="font-weight-bold">Add new Question</h4> <!-- Updated to reflect Employer data -->

            <button onclick="closeModal()" type="button"
                class="bg-white text-black h-[30px] w-[30px] rounded-[50px]" data-target="#exampleModalCenter">
                <i class="fa fa-close"></i></button>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('AddHalqa/add')}}" method="POST">
                @csrf
                
                
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label class="form-label font-weight-bold" for="district_id">Select distric/ضلع</label>
                        <select name="district_id" id="district_id" class="form-control" required onchange="get_tehsils(this)">
                            <option value="">Choose district</option>
                            @foreach($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>                                
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="form-label font-weight-bold" for="tehsil_id">Select Tehsil/تحصیل</label>
                        <select name="tehsil_id" id="tehsil_id" class="form-control" required>
                            <option value="">Choose Tehsil</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="form-label font-weight-bold">Halqa Name/حلقہ</label>
                        <input class="form-control form-control-lg" type="text" name="halqa_name" required>
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
    <h4><strong>Halqa List</strong></h4>
    <button onclick="openModal()" type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#exampleModalCenter">
        <i class="fa fa-plus"></i> </button>
</div> 
                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="districtDeleteForm" action="{{ route('district.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <table id="example" class="table table-bordered border-t0 key-buttons text-nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>#</th>
                                            <th>Halqa Name/حلقہ</th>
                                            <th>Tehsil Name</th>
                                            <th>District Name</th>
                                            <th>Divsion</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($halqas as $halqa)
                                        <tr>
                                            <td><input type="checkbox" name="ids[]" value="{{ $halqa->id }}"></td>
                                            <td>{{ $halqa->id }}</td>
                                            <td>{{ $halqa->halqa_name }}</td>
                                            <td>{{ $halqa->tehsil_name }}</td>
                                            <td>{{ $halqa->district_name }}</td>
                                            <td>{{ $halqa->divsion_name }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-primary badge" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    
                                </table>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
    </section>

    @if(Session::has('success'))
        <script>
            swal({
                title: "Success!",
                text: "{{ Session::get('success') }}",
                icon: "success",
                button: "OK",
            });
            
        </script>
    @endif

    <script>
    function get_tehsils(element) {
        var districtId = element.value; // Get the selected district ID
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
    /**************************************************************/
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
            fetch(`{{ route('district.delete') }}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
    
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
</div>         
 @endsection
 <script>
  
</script>

 