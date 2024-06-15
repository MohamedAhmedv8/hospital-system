@extends('Dashboard.layouts.master')
@section('title')
عرض المرفقات
@stop
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">صور الاشعة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$ray_file->Patient->name}}</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
    <div class="form-group">
        <label for="exampleFormControlTextarea1">التشخيص</label>
        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="6">{{$ray_file->description_employee}}</textarea>
    </div>
    <!-- Gallery -->
    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row row-sm pr-0">
            <li class="col-sm-6 col-lg-4">
                @if($ray_file->image)
                    <img class="img-responsive" src="{{ asset("storage/$ray_file->image") }}"width="500px" height="500px" alt="">
                @endif
            </li>
        </ul>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection