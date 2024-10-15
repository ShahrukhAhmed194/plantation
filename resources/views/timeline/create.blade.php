@extends('layouts.admin-layout')

@section('title', 'Timeline Create')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-xxl-n4">
                    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                        <div class="card-body px-4 py-3">
                            <div class="row align-items-center">
                                <div class="col-9">
                                <h4 class="fw-semibold mb-8">New Timeline</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted" href="/">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Add Timeline</li>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-md-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold mb-3">New Timeline Form</h5>
                            <form action="{{ url('/timeline/store') }}" method="POST" enctype="multipart/form-data" id="timeline_form">
                                @csrf
                                <input type="hidden" name="tree_id" value="{{ $id }}">
                                <div class="timeline">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="mb-4">
                                                <label for="photo_date" class="form-label fw-semibold"><i class="text-danger">* </i>Plantation Date</label>
                                                <input type="date" name="photo_date[]" class="form-control">
                                                @error('photo_date.*')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="mb-4">
                                                <label for="tree_photo_path" class="form-label fw-semibold"><i class="text-danger"> * </i> Upload Image</label>
                                                <input type="file" name="tree_photo_path[]" class="form-control">
                                                @error('tree_photo_path.*')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-4 mt-4">
                                                <button class="btn btn-danger form-control remove" style="display: none;">Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mt-4 gap-3">
                                        <a class="btn btn-light" href="/">Back</a>
                                        <button class="btn btn-success">Add New</button>
                                        <button class="btn btn-primary" id="submit_timeline">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/jquery/timeline/create-1.0.0.js')}}"></script>
@endsection