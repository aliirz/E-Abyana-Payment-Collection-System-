@extends('layout')

@section('content')
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
            <form class="form-horizontal" action="{{ route('AddDivsion/add') }}" method="POST">
                @csrf
                
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
                            @foreach($divsions as $divsion)
                            <tr>
                             
                                <td>{{ $divsion->id }}</td>
                                <td>{{ $divsion->divsion_name }}</td>
                                <td>
                                    <form
                                    action="{{ route('AddDivsion.destroy', $divsion->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this irrigator?');"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                
    
                                            <button class="btn btn-sm btn-primary badge rounded-pill" type="submit">
                                                <i class="fa fa-trash"></i>
                                            </button>
    
                                </form>
                                </td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div

              
 @endsection
 