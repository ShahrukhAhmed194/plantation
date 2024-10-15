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
                                    <li class="breadcrumb-item" aria-current="page">New Requests</li>
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
                                <h5 class="card-title fw-semibold  mb-3">New Request List</h5>
                            </div>
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                                <table id="new_request_table" class="table border table-striped table-bordered text-nowrap table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Sender's Name</th>
                                            <th scope="col">Sender's Number</th>
                                            <th scope="col">Receiver's Name</th>
                                            <th scope="col">Receiver's Number</th>
                                            <th scope="col">Request Date</th>
                                            <th scope="col">Request Time</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($requests)
                                            @foreach($requests as $request)
                                            <tr>
                                                <th scope="row">{{ $request->id }}</th>
                                                <th>{{ $request->senderInfo->name }}</th>
                                                <th>{{ $request->senderInfo->phone }}</th>
                                                <th>{{ $request->receiver_name }}</th>
                                                <th>{{ $request->receiver_phone }}</th>
                                                <th>{{ $request->created_at->addHour(6)->format('d M, Y') }}</th>
                                                <th>{{ $request->created_at->addHour(6)->format('h:m a') }}</th>
                                                <th>{{ $request->status == 0 ? 'Pending' : ($request->status == 2 ? 'Delivered': 'Processing')}}</th>
                                                <th> {{ $request->receiverAddress->division }}, {{ $request->receiverAddress->district }}, {{ $request->receiverAddress->home_address }}</th>
                                                <th class="justify-content-center"><a href="{{ url('/request/process', $request->id) }}"> <i class="ti ti-edit"></i></a></th>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/jquery/request/index-1.0.0.js')}}"></script>
@endsection