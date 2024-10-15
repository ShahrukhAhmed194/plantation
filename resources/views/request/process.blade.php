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
                                <h4 class="fw-semibold mb-8">Gift Request</h4>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted" href="/">Home</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Process Request</li>
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
                            <h5 class="card-title fw-semibold  mb-3">Add A Tree</h5>
                            <form action="{{url('/request/update-request')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tree_request">
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{$request->id}}">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="receiver_name" class="form-label fw-semibold"><i class="text-danger">* </i>Receiver's Name</label>
                                                <input type="text" name="receiver_name" value="{{$request->receiver_name}}" class="form-control" id="receiver_name" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="receiver_phone" class="form-label fw-semibold"><i class="text-danger"> * </i> Receiver's Phone</label>
                                                <input type="text" name="receiver_phone" value="{{$request->receiver_phone}}" class="form-control" id="receiver_phone" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <input type="hidden" name="address_of" value="person">
                                        <input type="hidden" name="address_id" value={{$request->receiverAddress->id}}>
                                        <div class="col-lg-4">
                                            <div class="mb-3 has-success">
                                                <label for="division"  class="form-label fw-semibold"> <i class="text-danger"> * </i> Receiver's Division</label>
                                                <input type="text" name="division" value="{{$request->receiverAddress->division}}" class="form-control" id="division" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label for="district" class="form-label fw-semibold"><i class="text-danger"> * </i> Receiver's District</label>
                                                <input type="text" name="district" value="{{$request->receiverAddress->district}}" class="form-control" id="district" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label for="home_address" class="form-label fw-semibold"><i class="text-danger">* </i>Receiver's Home Address</label>
                                                <input type="text" name="home_address" value="{{$request->receiverAddress->home_address}}" class="form-control" id="home_address" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                @if($request->tree_id)
                                                    <label for="tree_id" class="form-label fw-semibold"><i class="text-danger"> * </i> Select A Tree</label>
                                                    <input type="hidden" name="tree_id" value="{{$request->assignedTree->id}}" id="tree_id" >
                                                    <input type="text" value="{{$request->assignedTree->details}}" class="form-control" readonly >
                                                @else
                                                    <label for="tree_id" class="form-label fw-semibold"><i class="text-danger">* </i>Select A Tree</label>
                                                    <select id="tree_id" name="tree_id" class="form-control custom-select">
                                                        <option value="">- Please Select -</option>
                                                        @foreach($trees as $tree)
                                                            <option value="{{ $tree->id}}"> {{ $tree->details }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                @error('tree_id')
                                                    <div class="text-danger ">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="status" class="form-label fw-semibold"><i class="text-danger">* </i>Status</label>
                                                <select id="status" name="status" class="form-control custom-select">
                                                    <option value="" disabled>- Please Select -</option>
                                                    <option value="0" {{$request->status == 0 ? 'selected' : ''}}> Pending </option>
                                                    <option value="1" {{$request->status == 1 ? 'selected' : ''}}> Processing </option>
                                                    <option value="2" {{$request->status == 2 ? 'selected' : ''}}> Delivered </option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger ">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-10"></div>
                                        <div class="col-2">
                                            <div class="text-end  mt-4 gap-3">
                                                <button class="btn btn-primary" id="submit_tree_request">Submit</button>
                                            </div>
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
    <script src="{{asset('assets/jquery/request/process-1.0.0.js')}}"></script>
@endsection