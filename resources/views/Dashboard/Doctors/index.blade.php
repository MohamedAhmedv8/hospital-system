@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/doctors_trans.doctors')}}
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">

<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/doctors_trans.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/doctors_trans.doctors_list')}}</span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
				<!-- row -->
					<div class="row row-sm">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-header pb-0">
										<button type="button" class="btn btn-danger" id="btn_delete_all">{{trans('Dashboard/doctors_trans.delete_select_all')}}</button>
									</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table text-md-nowrap" id="example1">
											<thead>
												<tr>
													<th>#</th>
													<th><input name="select_all" id="example-select-all" type="checkbox"></th>
													<th >{{trans('Dashboard/doctors_trans.photo')}}</th>
													<th >{{trans('Dashboard/doctors_trans.name')}}</th>
													<th >{{trans('Dashboard/doctors_trans.email')}}</th>
													<th>{{trans('Dashboard/doctors_trans.section')}}</th>
													<th >{{trans('Dashboard/doctors_trans.phone')}}</th>
													<th >{{trans('Dashboard/doctors_trans.appointments')}}</th>
													<th >{{trans('Dashboard/doctors_trans.status_doctor')}}</th>
													<th >{{ trans('Dashboard/doctors_trans.number_of_statements') }}</th>
													<th>{{trans('Dashboard/doctors_trans.date_added')}}</th>
													<th>{{trans('Dashboard/doctors_trans.action')}}</th>
												</tr>
											</thead>
											<tbody>
												@foreach($doctors as $doctor)
												<tr>
													<td>{{ $loop->iteration }}</td>
													<td><input name="delete_select" value="{{ $doctor->id }}" type="checkbox"></td>
													<td>
														@if($doctor->image)
														<img src="{{ asset("storage/$doctor->image") }}"width="35px" height="35px" alt="">
														@else
														<img src="{{ asset('Dashboard/img/doctor-icon.png') }}" width="35px" height="35px" alt="xxxx">
														@endif</td>
													<td>{{ $doctor->name }}</td>
													<td>{{ $doctor->email }}</td>
													<td>{{ $doctor->section->name}}</td>
													<td>{{ $doctor->phone}}</td>
													<td>
														@foreach ($doctor->doctorappointments as $appointment)
															{{ $appointment->name }}
														@endforeach
													</td>
													<td>
														<div class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
														{{$doctor->status == 1 ? trans('Dashboard/doctors_trans.doctor_enable'):trans('Dashboard/doctors_trans.doctor_not_enable')}}
													</td>
													<td>{{ $doctor->number_of_statements }}</td>
													<td>{{ $doctor->created_at->diffForHumans() }}</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('Dashboard/doctors_trans.action')}}<i class="fas fa-caret-down mr-1"></i></button>
															<div class="dropdown-menu tx-13">
																<a class="dropdown-item" href="{{route('Doctors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp; {{trans('Dashboard/doctors_trans.edit_data')}}</a>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;{{trans('Dashboard/doctors_trans.change_password')}}</a>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;{{trans('Dashboard/doctors_trans.edit_status')}}</a>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;{{trans('Dashboard/doctors_trans.delete_data')}}</a>
															</div>
														</div>
													</td>
												</tr>
												@include('Dashboard.Doctors.delete')
												@include('Dashboard.Doctors.delete_select')
												@include('Dashboard.Doctors.update_password')
												@include('Dashboard.Doctors.update_status')
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('Dashboard/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('Dashboard/js/table-data.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
<script src="{{URL::asset('plugins/notify/js/notifit-custom.js')}}"></script>
<script>
	$(function() {
		jQuery("[name=select_all]").click(function(source) {
			checkboxes = jQuery("[name=delete_select]");
			for(var i in checkboxes){
				checkboxes[i].checked = source.target.checked;
			}
		});
	})
</script>
<script type="text/javascript">
	$(function () {
		$("#btn_delete_all").click(function () {
			var selected = [];
			$("#example1 input[name=delete_select]:checked").each(function () {
				selected.push(this.value);
			});
			if (selected.length > 0) {
				$('#delete_select').modal('show')
				$('input[id="delete_select_id"]').val(selected);
			}
		});
	});
</script>
@endsection
