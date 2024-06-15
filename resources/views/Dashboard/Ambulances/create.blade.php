@extends('Dashboard.layouts.master')
@section('title')
{{ trans('Dashboard/ambulances_trans.add_car_ambulances') }}
@endsection
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/ambulances_trans.ambulances') }}
            </h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/ambulances_trans.add_car_ambulances') }}
            </span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
<!-- row -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('ambulances.store')}}" method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label>{{ trans('Dashboard/ambulances_trans.car_number') }}
                            </label>
                            <input type="text" name="car_number"  value="{{old('car_number')}}" class="form-control @error('car_number') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('Dashboard/ambulances_trans.car_model') }}
                            </label>
                            <input type="text" name="car_model"  value="{{old('car_model')}}" class="form-control @error('car_model') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('Dashboard/ambulances_trans.car_year_made') }}
                            </label>
                            <input type="number" name="car_year_made"  value="{{old('car_year_made')}}" class="form-control @error('car_year_made') is-invalid @enderror">
                        </div>

                        <div class="col">
                            <label>{{ trans('Dashboard/ambulances_trans.car_type') }}
                            </label>
                            <select class="form-control" name="car_type">
                                <option value="1">{{ trans('Dashboard/ambulances_trans.Owned') }}
                                </option>
                                <option value="2">{{ trans('Dashboard/ambulances_trans.rent') }}
                                </option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-3">
                            <label>{{ trans('Dashboard/ambulances_trans.driver_name') }}
                            </label>
                            <input type="text" name="driver_name" value="{{old('driver_name')}}" class="form-control @error('driver_name') is-invalid @enderror">
                        </div>

                        <div class="col-3">
                            <label>{{ trans('Dashboard/ambulances_trans.driver_license_number') }}
                            </label>
                            <input type="number" name="driver_license_number"  value="{{old('driver_license_number')}}" class="form-control @error('driver_license_number') is-invalid @enderror">
                        </div>

                        <div class="col-6">
                            <label>{{ trans('Dashboard/ambulances_trans.driver_phone') }}
                            </label>
                            <input type="number" name="driver_phone"  value="{{old('driver_phone')}}" class="form-control @error('driver_phone') is-invalid @enderror">
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>{{ trans('Dashboard/ambulances_trans.notes') }}
                            </label>
                            <textarea rows="5" cols="10" class="form-control" name="notes"></textarea>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success">{{ trans('Dashboard/ambulances_trans.submit') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection