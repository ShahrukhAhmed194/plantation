@extends('layouts.admin-layout')

@section('title', 'Dashboar')

@section('content')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-md-3">
                <div class="item">
                  <div class="card bg-info">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="{{asset('assets/modernize/images/svgs/icon-form.svg')}}" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-dark mb-1"> Total </br> Trees </p>
                        <a href="/tree/list" id="total_number_of_trees" class="card-title fs-18 font-weight-bold"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="item">
                  <div class="card bg-secondary">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="{{asset('assets/modernize/images/svgs/icon-form.svg')}}" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-dark mb-1"> Pending </br> Requests </p>
                        <a href="/request/show-new" id="total_number_of_pending_requests" class="card-title fs-18 font-weight-bold"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="item">
                  <div class="card bg-success">
                    <div class="card-body">
                      <div class="text-center">
                        <img src="{{asset('assets/modernize/images/svgs/icon-form.svg')}}" width="50" height="50" class="mb-3" alt="" />
                        <p class="fw-semibold fs-3 text-dark mb-1"> Assigned </br> Trees </p>
                        <a href="/tree/assigned" id="total_number_of_assigned_trees" class="card-title fs-18 font-weight-bold"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>  
    </div>
    <script src="{{asset('assets/jquery/dashboard/admin-1.0.0.js')}}"></script>

@endsection