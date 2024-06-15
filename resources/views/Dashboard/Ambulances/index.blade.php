@extends('Dashboard.layouts.master')
@section('title')
{{ trans('Dashboard/ambulances_trans.ambulances') }}
@endsection
@section('css')
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{ trans('Dashboard/ambulances_trans.ambulances') }}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ trans('Dashboard/ambulances_trans.car_ambulances') }}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
				<!-- row opened -->
				<div class="row row-sm">
					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
                                    <a href="{{route('ambulances.create')}}" class="btn btn-primary">{{ trans('Dashboard/ambulances_trans.add_car_ambulances') }}</a>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th>#</th>
												<th>{{ trans('Dashboard/ambulances_trans.car_number') }}</th>
												<th>{{ trans('Dashboard/ambulances_trans.car_model') }}</th>
												<th>{{ trans('Dashboard/ambulances_trans.car_year_made') }}</th>
												<th>{{ trans('Dashboard/ambulances_trans.car_type') }}</th>
												<th>{{ trans('Dashboard/ambulances_trans.driver_name') }}</th>
                                                <th>{{ trans('Dashboard/ambulances_trans.driver_license_number') }}</th>
                                                <th>{{ trans('Dashboard/ambulances_trans.driver_phone') }}</th>
                                                <th>{{ trans('Dashboard/ambulances_trans.is_available') }}</th>
                                                <th>{{ trans('Dashboard/ambulances_trans.notes') }}</th>
                                                <th>{{ trans('Dashboard/ambulances_trans.action') }}</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($ambulances as $ambulance)
											<tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$ambulance->car_number}}</td>
                                                <td>{{$ambulance->car_model}}</td>
                                                <td>{{$ambulance->car_year_made}}</td>
                                                <td>{{$ambulance->car_type == 1 ? 'Owned' :'rent'}}</td>
                                                <td>{{$ambulance->driver_name}}</td>
                                                <td>{{$ambulance->driver_license_number}}</td>
                                                <td>{{$ambulance->driver_phone}}</td>
                                                <td>{{$ambulance->is_available == 1 ? 'enable':'unenabled'}}</td>
                                                <td>{{$ambulance->notes}}</td>
                                                <td>
                                                    <a href="{{route('ambulances.edit',$ambulance->id)}}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete{{$ambulance->id}}"><i class="fas fa-trash"></i></button>
                                                </td>
											</tr>
                                            @include('Dashboard.Ambulances.delete')
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection