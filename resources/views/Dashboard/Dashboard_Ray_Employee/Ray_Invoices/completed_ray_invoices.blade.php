@extends('Dashboard.layouts.master')
@section('title')
    الارشيف
@stop
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الكشوفات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ الفواتير</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>تاريخ الأشعة</th>
                                <th>اسم المريض</th>
                                <th>اسم الدكتور</th>
                                <th>المطلوب</th>
                                <th>التشخيص</th>
                                <th>عرض</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ray_invoices as $ray_invoice)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $ray_invoice->created_at }}</td>
                                    <td>{{ $ray_invoice->patient->name }}</td>
                                    <td>{{ $ray_invoice->doctor->name }}</td>
                                    <td>{{ $ray_invoice->description }}</td>
                                    <td>{{ $ray_invoice->description_employee }}</td>
                                    <td><a class="modal-effect btn btn-sm btn-primary" href="{{ route('view_ray',$ray_invoice->id) }}">عرض</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
        <!-- /row -->
    </div>
    <!-- row closed -->
    <!-- Container closed -->
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection