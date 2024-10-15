@extends('layouts.user-layout')

@section('title', 'My Gift List')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-xxl-n4">
                    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                <h4 class="fw-semibold mb-8">New Gifts</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted" href="/">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Add Gifts</li>
                                    </ol>
                                </nav>
                                </div>
                                <div class="col-3">
                                <div class="text-center mb-n5">  
                                    <img src="{{ asset('assets/modernize/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold  mb-3">New Gift Form</h5>
                            <form action="{{url('/request/store')}}" method="POST" enctype="multipart/form-data" id="tree_request_form">
                                @csrf
                                <div class="tree_request">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label for="name" class="form-label fw-semibold"><i class="text-danger">* </i>Receiver's Name</label>
                                                <input type="text" name="name[]" class="form-control">
                                                <span class="error-msg text-danger d-none">Please select receiver's name</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label for="phone" class="form-label fw-semibold"><i class="text-danger"> * </i> Receiver's Phone</label>
                                                <input type="text" name="phone[]" class="form-control">
                                                <span class="error-msg text-danger d-none">Please select receiver's phone</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label for="home_address" class="form-label fw-semibold"><i class="text-danger">* </i>Receiver's Home Address</label>
                                                <input type="text" name="home_address[]" class="form-control">
                                                <span class="error-msg text-danger d-none">Please select receiver's home address</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3 has-success">
                                                <label class="form-label fw-semibold"> <i class="text-danger"> * </i> Receiver's Division</label>
                                                <select id="division" name="division[]" class="form-control custom-select" onchange="showDistrictsOfADivision(this.value)">
                                                    <option value="">- Please Select -</option>
                                                    @foreach($divisions as $division)
                                                        <option value="{{$division}}">{{$division}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="error-msg text-danger d-none">Please select receiver's division</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label for="district" class="form-label fw-semibold"><i class="text-danger"> * </i> Receiver's District</label>
                                                <select id="district" name="district[]" class="form-control custom-select">
                                                </select>
                                                <span class="error-msg text-danger d-none">Please elect receiver's district</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-end mt-4 gap-3">
                                        <button class="btn btn-success" id="add_new">Add New</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4 text-end">
                            <button class="btn btn-primary" id="submit_tree_request">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/jquery/dashboard/create-request-1.0.0.js')}}"></script>
@endsection