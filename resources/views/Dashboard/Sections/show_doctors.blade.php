@extends('Dashboard.layouts.master')
@section('title')
    {{$section->name}} / {{trans('Dashboard/sections_trans.section_doctors')}}
@stop
@section('css')
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{$section->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/sections_trans.section_doctors')}}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
@include('Dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('Dashboard/doctors_trans.name')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.email')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.section')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.phone')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.appointments')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.status_doctor')}}</th>
                                <th>{{trans('Dashboard/doctors_trans.action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{$doctor->name}}</td>
                                <td>{{ $doctor->email }}</td>
                                <td>{{ $doctor->section->name}}</td>
                                <td>{{ $doctor->phone}}</td>
                                <td>
                                    @foreach($doctor->doctorappointments as $appointment)
                                        {{$appointment->name}}
                                    @endforeach
                                </td>
                                <td>
                                    <div
                                    class="dot-label bg-{{$doctor->status == 1 ? 'success':'danger'}} ml-1"></div>
                                    {{$doctor->status == 1 ? trans('Dashboard/doctors_trans.doctor_enable'):trans('Dashboard/doctors_trans.doctor_not_enable')}}
                                    
                                </td>
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
    </div>
    </div>
@endsection
@section('js')
@endsection