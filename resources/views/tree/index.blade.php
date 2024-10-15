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
                                    <li class="breadcrumb-item" aria-current="page">All Trees</li>
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
                            <h5 class="card-title fw-semibold  mb-3">Tree Profile List</h5>
                            </div>
                            <div class="table-responsive" style="overflow-x: auto; overflow-y: hidden;">
                                <table id="tree_list_table" class="table border table-striped table-bordered text-nowrap table-responsive">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Longitude</th>
                                            <th scope="col">Latitude</th>
                                            <th scope="col">Planting Date</th>
                                            <th scope="col">Planting Time</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($tree_profiles as $tree_profile)
                                        <tr>
                                            <th scope="row">{{ $tree_profile->id }}</th>
                                            <td>
                                                 {{ $tree_profile->details }}</a>
                                            </td>
                                            <td>{{ $tree_profile->status == 0 ? 'Available' : 'Assigned' }}</td>
                                            @if(!is_null($tree_profile->address_id))
                                                <td>{{ $tree_profile->treeAddress->division}}, {{ $tree_profile->treeAddress->district}}, {{ $tree_profile->treeAddress->home_address}}</td>
                                            @else
                                                <td>No address was </td>
                                            @endif
                                            <td>{{ $tree_profile->longitude }}</td>
                                            <td>{{ $tree_profile->latitude }}</td>
                                            <td>{{ $tree_profile->planting_date }}</td>
                                            <td>{{ $tree_profile->planting_time }}</td>
                                            <td>
                                                <a href="{{ url('/tree/edit', $tree_profile->id) }}"> <i class="ti ti-edit"></i></a>
                                                <a href="{{ url('/timeline/show', $tree_profile->id) }}"><i class="ti ti-photo"></i></a>
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
        </div>
    </div>
    <script src="{{asset('assets/jquery/tree/index-1.0.0.js')}}"></script>
@endsection