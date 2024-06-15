@extends('Dashboard.layouts.master')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    {{trans('Dashboard/Insurances_trans.edit_insurance')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/Insurances_trans.services')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/Insurances_trans.edit_insurance')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('insurance.update','test')}}" method="post">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{$insurances->id}}">
                        <div class="row">
                            <div class="col">
                                <label>{{trans('Dashboard/Insurances_trans.code')}}</label>
                                <input type="text" name="insurance_code" value="{{$insurances->insurance_code}}"class="form-control">

                            </div>
                            <div class="col">
                                <label>{{trans('Dashboard/Insurances_trans.name')}}</label>
                                <input type="text" name="name" value="{{$insurances->name}}"class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>{{trans('Dashboard/Insurances_trans.discount_percentage')}} %</label>
                                <input type="number" name="discount_percentage" value="{{$insurances->discount_percentage}}"class="form-control">
                            </div>
                            <div class="col">
                                <label>{{trans('Dashboard/Insurances_trans.insurance_bearing_percentage')}} %</label>
                                <input type="number" name="Company_rate" value="{{$insurances->Company_rate}}"  class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>{{trans('Dashboard/Insurances_trans.notes')}}</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes">{{$insurances->notes}}</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>{{trans('Dashboard/Insurances_trans.a_status')}}</label>
                                &nbsp;
                                <input name="status" {{$insurances->status == 1 ? 'checked' : ''}} value="1" type="checkbox" class="form-check-input" id="exampleCheck1">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{trans('Dashboard/Insurances_trans.submit')}}</button>
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
    <!--Internal  Notify js -->
    <script src="{{URL::asset('Admin/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('Admin/assets/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection