@extends('layouts.admin-layout')

@section('title', 'Dashboar')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-xxl-n4">
                    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                        <div class="card-body px-4 py-3">
                        <div class="row align-items-center">
                            <div class="col-9">
                            <h4 class="fw-semibold mb-8">Tree Profile</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="/">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Add Tree</li>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold  mb-3">New Tree Profile Form</h5>
                            <form action="{{url('/tree/store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label for="details" class="form-label fw-semibold"><i class="text-danger">* </i>Details</label>
                                            <input type="text" name="details" value="{{old('details')}}" class="form-control" id="details">
                                            @error('details')
                                                <div class="text-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label for="longitude" class="form-label fw-semibold"> Longitude</label>
                                            <input type="text" name="longitude" value="{{old('longitude')}}" class="form-control" id="longitude">
                                            @error('longitude')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label for="latitude" class="form-label fw-semibold">Latitude</label>
                                            <input type="text" name="latitude" value="{{old('latitude')}}" class="form-control" id="latitude">
                                            @error('latitude')
                                                <div class="text-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="address_of" value="tree">
                                    <div class="col-lg-4">
                                        <div class="mb-3 has-success">
                                            <label class="form-label fw-semibold">Plantation's Division</label>
                                            <select id="division" name="division" class="form-control custom-select" onchange="showDistrictsOfADivision(this.value)">
                                                <option value="">- Please Select -</option>
                                                @foreach($divisions as $division)
                                                    <option value="{{$division}}">{{$division}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label for="district" class="form-label fw-semibold"> Plantation's District</label>
                                            <select id="district" name="district" class="form-control custom-select">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-4">
                                            <label for="home_address" class="form-label fw-semibold">Plantation's Area Address</label>
                                            <input type="text" name="home_address" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="planting_date" class="form-label fw-semibold">Plantation Date</label>
                                            <input type="date" name="planting_date" value="{{old('planting_date')}}" class="form-control" id="planting_date">
                                            @error('planting_date')
                                                <div class="text-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="planting_time" class="form-label fw-semibold">Plantation Time</label>
                                            <input type="time" name="planting_time" value="{{old('planting_time')}}" class="form-control" id="planting_time">
                                            @error('planting_time')
                                                <div class="text-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="photo_date" class="form-label fw-semibold">Photo Taking Date</label>
                                            <input type="date" name="photo_date" value="{{old('photo_date')}}" class="form-control" id="photo_date">
                                            @error('photo_date')
                                                <div class="text-danger ">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-4">
                                            <label for="image_upload" class="form-label fw-semibold">Upload Image</label>
                                            <input type="file" name="image_upload" class="form-control" id="image_upload">
                                            @error('image_upload')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class=" align-items-center justify-content-end mt-4 gap-3">
                                            <a class="btn btn-light" href="/">Back</a>
                                            <button class="btn btn-primary float-end">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/jquery/tree/create-1.0.0.js')}}"></script>

@endsection