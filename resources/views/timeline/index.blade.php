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
                                    <li class="breadcrumb-item" aria-current="page">Tree Timeline</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-2">
                                <h5 class="card-title fw-semibold  mb-3">Timeline Photo(s)</h5>
                            </div>
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                                <table id="zero_config" class="table border table-striped table-bordered text-nowrap table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tree</th>
                                            <th scope="col">Photo Capture Date</th>
                                            <th scope="col">Created By</th>
                                            <th scope="col">Updated By</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($timelines as $timeline)
                                        <tr>
                                            <th scope="row">{{ $timeline->id }}</th>
                                            <td>{{ $timeline->treeProfile->details }}</td>
                                            <td>{{ $timeline->photo_date }}</td>
                                            <td>{{ $timeline->created_by ? '':'' }}</td>
                                            <td>{{ Storage::url($timeline->tree_photo_path) }}</td>
                                            <td><img src="{{ Storage::url($timeline->tree_photo_path) }}" alt="Timeline Image" height="100" width="100"></td>
                                            <td class="text-center align-middle">
                                                <a href="{{ url('/timeline/delete', $timeline->id) }}"><i class="ti ti-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card w-100 position-relative overflow-hidden mb-0">
                        <div class="card-body p-4">
                            <h5 class="card-title fw-semibold  mb-3">Add New Photo(s)</h5>
                            <form action="{{url('/timeline/store')}}" method="POST" enctype="multipart/form-data" id="timeline_form">
                                @csrf
                                <input type="hidden" name="tree_id" value="{{$tree_id}}">
                                <div class="row timeline">
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
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex justify-content-between align-items-center mt-4 gap-3">
                                        <a class="btn btn-light" href="/tree/list">Back</a>
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