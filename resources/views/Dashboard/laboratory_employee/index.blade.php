@extends('Dashboard.layouts.master')
@section('title')
{{trans('Dashboard/laboratory_employee_trans.list_employee_laboratory')}}
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/laboratory_employee_trans.laboratory')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/laboratory_employee_trans.list_employee')}}</span>
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
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">{{trans('Dashboard/laboratory_employee_trans.add_new_employee')}}</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table style="text-align: center" class="table text-md-nowrap" id="example1">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{trans('Dashboard/laboratory_employee_trans.name')}}</th>
                                                <th >{{trans('Dashboard/laboratory_employee_trans.email')}}</th>
                                                <th>{{trans('Dashboard/laboratory_employee_trans.data')}}</th>
                                                <th >{{trans('Dashboard/laboratory_employee_trans.action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                        @foreach($laboratory_employees as $laboratory_employee)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$laboratory_employee->name}}</td>
                                                <td>{{ $laboratory_employee->email }}</td>
                                                <td>{{ $laboratory_employee->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$laboratory_employee->id}}"><i class="las la-pen"></i></a>
                                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$laboratory_employee->id}}"><i class="las la-trash"></i></a>
                                                </td>
                                            </tr>
                                            @include('Dashboard.laboratory_employee.edit')
                                            @include('Dashboard.laboratory_employee.delete')
                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- bd -->
                            </div><!-- bd -->
                        </div>
                        <!--/div-->
                    @include('Dashboard.laboratory_employee.add')
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