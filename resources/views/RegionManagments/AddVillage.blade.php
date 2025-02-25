@extends('layout')

@section('content')
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

       

<div id="simpleModal" class="fixed  inset-0 bg-gray-400 bg-opacity-50 flex z-50 items-center justify-center hidden">
  
    <div class="card shadow-sm w-[40vw]">
        <div class="card-header bg-primary flex justify-between text-white">
            <h4 class="font-weight-bold">Add Village</h4> <!-- Updated to reflect Employer data -->

            <button onclick="closeModal()" type="button"
                class="bg-white text-black h-[30px] w-[30px] rounded-[50px]" data-target="#exampleModalCenter">
                <i class="fa fa-close"></i></button>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('AddVillage/add') }}" method="POST">
                @csrf
                
                <div class="form-group col-lg-12">
                    <label class="form-label font-weight-bold" for="tehsil_id" style="font-size: 1.2rem; display: block;">Select Tehsil/تحصیل</label>
                    <select name="tehsil_id" id="tehsil_id" class="form-control form-control-lg" required style="font-size: 1.1rem; padding: 0.5rem 1rem; line-height: 1.5;">
                        <option value="" style="font-weight: bold;">Choose Tehsil/تحصیل</option>
                        @foreach($tehsils as $tehsil)
                            <option value="{{$tehsil->tehsil_id }}">{{$tehsil->tehsil_name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group col-lg-12">
                    <label class="form-label font-weight-bold" for="halqa_id" style="">Select Halqa/حلقہ</label>
                    <select name="halqa_id" id="halqa_id" class="form-control form-control-lg" required style="font-size: 1.1rem; padding: 0.5rem 1rem; line-height: 1.5;">
                        <option value="" style="font-weight: bold;">Choose Halqa/حلقہ</option>
                        @foreach($Halqas as $Halqa)
                            <option value="{{$Halqa->id }}">{{$Halqa->halqa_name }}</option>
                        @endforeach
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
 <div class="card-header d-flex justify-content-between">
    <h4><strong>Irrigators List</strong></h4>
    <button onclick="openModal()" type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#exampleModalCenter">
        <i class="fa fa-plus"></i> </button>
</div> 
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('tehsil.delete') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                
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
                                        @foreach($villages as $village)
                                        <tr>
                                            <td><input type="checkbox" name="ids[]" value=""></td>
                                            <td>{{ $village->village_id }}</td>
                                            <td>{{ $village->village_name }}</td>
                                            <td>{{ $village->tehsil_name }}</td>
                                            <td>{{ $village->district_name }}</td>
                                            <td>{{ $village->divsion_name }}</td>
                                            
                                     
                                            <td>
                                                <button class="btn btn-sm btn-primary badge" type="submit">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
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


              
 @endsection
 