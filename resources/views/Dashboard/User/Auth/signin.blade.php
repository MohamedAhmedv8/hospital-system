@extends('Dashboard.layouts.master2')
@section('title')
    {{trans('Dashboard/login_trans.login')}}
@stop
@section('css')
<style>
	.loginform {display: none;}
</style>
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
		<div class="container-fluid">
			<div class="row no-gutter">
				<!-- The image half -->
				<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
					<div class="row wd-100p mx-auto text-center">
						<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
							<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
						</div>
					</div>
				</div>
				<!-- The content half -->
				<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1></div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2>{{ trans('Dashboard/login_trans.Welcome') }}</h2>
													@if ($errors->any())
													<div class="alert alert-danger">
															<ul>
																@foreach ($errors->all() as $error)
																<li>{{ $error }}</li>
																	@endforeach
															</ul>
														</div>
													@endif
												<div class="form-group">
													<label for="exampleFormControlSelect1">{{ trans('Dashboard/login_trans.select_login') }}</label>
													<select class="form-control" id="sectionChooser">
														<option value="" selected disabled>{{ trans('Dashboard/login_trans.Choose_from_the_list') }}</option>
														{{-- <option value="user">{{ trans('Dashboard/login_trans.Log_in_as_a_user') }}</option> --}}
														<option value="admin">{{ trans('Dashboard/login_trans.Log_in_as_a_admin') }}</option>
														<option value="doctor">{{ trans('Dashboard/login_trans.Log_in_as_a_doctor') }}</option>
														<option value="ray_employee">{{ trans('Dashboard/login_trans.Log_in_as_a_ray_employee') }}</option>
														<option value="laboratory_employee">{{ trans('Dashboard/login_trans.Log_in_as_a_laboratory_employee') }}</option>
														<option value="patient">{{ trans('Dashboard/login_trans.Log_in_as_a_patient') }}</option>
													</select>
												</div>
													{{-- form user --}}
												{{-- <div class="loginform" id="user">
													<h5 class="font-weight-semibold mb-4">{{ trans('Dashboard/login_trans.Log_in_as_a_patient') }}</h5>
													<form method="POST" action="{{ route('login.user') }}">
													@csrf
													<div class="form-group">
														<label>{{ trans('Dashboard/login_trans.email') }}</label>
														<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_email') }}" type="email" name="email" :value="old('email')" required autofocus>
													</div>
													<div class="form-group">
														<label>{{ trans('Dashboard/login_trans.Password') }}</label>
														<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_password') }}" type="password" name="password" required autocomplete="current-password">
													</div>
													<button {{ __('Log in') }} class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.Sign_In') }}</button>
													<div class="row row-xs">
														<div class="col-sm-6">
															<button class="btn btn-block"><i class="fab fa-facebook-f"></i>{{ trans('Dashboard/login_trans.Signup_with_Facebook') }}</button>
														</div>
														<div class="col-sm-6 mg-t-10 mg-sm-t-0">
															<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>{{ trans('Dashboard/login_trans.Signup_with_Twitter') }}</button>
														</div>
													</div>
													</form>
													<div class="main-signin-footer mt-5">
													<p><a href="">{{ trans('Dashboard/login_trans.Forgot_password?') }}</a></p>
													<p>{{ trans("Dashboard/login_trans.Don't_have_an_account?") }}  <a href="{{ url('/' . $page='signup') }}"> {{ trans('Dashboard/login_trans.Create_an_Account') }}</a></p>
													</div>
												</div> --}}
												{{-- form admin --}}
												<div class="loginform" id="admin">
													<h5 class="font-weight-semibold mb-4">{{ trans('Dashboard/login_trans.Log_in_as_a_admin') }}</h5>
													<form method="POST" action="{{ route('login.admin') }}">
														@csrf
														<div class="form-group">
															<label>{{ trans('Dashboard/login_trans.email') }}</label>
															<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_email') }}" type="email" name="email" :value="old('email')" required autofocus>
														</div>
														<div class="form-group">
															<label>{{ trans('Dashboard/login_trans.Password') }}</label>
															<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_password') }}" type="password" name="password" required autocomplete="current-password">
														</div>
														<button {{ __('Log in') }} class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.Sign_In') }}</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i>{{ trans('Dashboard/login_trans.Signup_with_Facebook') }}</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>{{ trans('Dashboard/login_trans.Signup_with_Twitter') }}</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">{{ trans('Dashboard/login_trans.Forgot_password?') }}</a></p>
														<p>{{ trans("Dashboard/login_trans.Don't_have_an_account?") }}  <a href="{{ url('/' . $page='signup') }}"> {{ trans('Dashboard/login_trans.Create_an_Account') }}</a></p>
													</div>
												</div>
												{{-- form Doctor --}}
												<div class="loginform" id="doctor">
													<h5 class="font-weight-semibold mb-4">{{ trans('Dashboard/login_trans.Log_in_as_a_doctor') }}</h5>
													<form method="POST" action="{{ route('login.doctor') }}">
														@csrf
														<div class="form-group">
															<label>{{ trans('Dashboard/login_trans.email') }}</label>
															<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_email') }}" type="email" name="email" :value="old('email')" required autofocus>
														</div>
														<div class="form-group">
															<label>{{ trans('Dashboard/login_trans.Password') }}</label>
															<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_password') }}" type="password" name="password" required autocomplete="current-password">
														</div>
														<button {{ __('Log in') }} class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.Sign_In') }}</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i>{{ trans('Dashboard/login_trans.Signup_with_Facebook') }}</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>{{ trans('Dashboard/login_trans.Signup_with_Twitter') }}</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">{{ trans('Dashboard/login_trans.Forgot_password?') }}</a></p>
														<p>{{ trans("Dashboard/login_trans.Don't_have_an_account?") }}  <a href="{{ url('/' . $page='signup') }}"> {{ trans('Dashboard/login_trans.Create_an_Account') }}</a></p>
													</div>
												</div>
												{{-- form ray_employee --}}
												<div class="loginform" id="ray_employee">
													<h5 class="font-weight-semibold mb-4">{{ trans('Dashboard/login_trans.Log_in_as_a_ray_employee') }}</h5>
													<form method="POST" action="{{ route('login.ray_employee') }}">
														@csrf
														<div class="form-group">
															<label>{{ trans('Dashboard/login_trans.email') }}</label>
															<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_email') }}" type="email" name="email" :value="old('email')" required autofocus>
														</div>
														<div class="form-group">
															<label>{{ trans('Dashboard/login_trans.Password') }}</label>
															<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_password') }}" type="password" name="password" required autocomplete="current-password">
														</div>
														<button {{ __('Log in') }} class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.Sign_In') }}</button>
														<div class="row row-xs">
															<div class="col-sm-6">
																<button class="btn btn-block"><i class="fab fa-facebook-f"></i>{{ trans('Dashboard/login_trans.Signup_with_Facebook') }}</button>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>{{ trans('Dashboard/login_trans.Signup_with_Twitter') }}</button>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="">{{ trans('Dashboard/login_trans.Forgot_password?') }}</a></p>
														<p>{{ trans("Dashboard/login_trans.Don't_have_an_account?") }}  <a href="{{ url('/' . $page='signup') }}"> {{ trans('Dashboard/login_trans.Create_an_Account') }}</a></p>
													</div>
												</div>
														{{-- form laboratory_employee --}}
														<div class="loginform" id="laboratory_employee">
															<h5 class="font-weight-semibold mb-4">{{ trans('Dashboard/login_trans.Log_in_as_a_laboratory_employee') }}</h5>
															<form method="POST" action="{{ route('login.laboratory_employee') }}">
																@csrf
																<div class="form-group">
																	<label>{{ trans('Dashboard/login_trans.email') }}</label>
																	<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_email') }}" type="email" name="email" :value="old('email')" required autofocus>
																</div>
																<div class="form-group">
																	<label>{{ trans('Dashboard/login_trans.Password') }}</label>
																	<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_password') }}" type="password" name="password" required autocomplete="current-password">
																</div>
																<button {{ __('Log in') }} class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.Sign_In') }}</button>
																<div class="row row-xs">
																	<div class="col-sm-6">
																		<button class="btn btn-block"><i class="fab fa-facebook-f"></i>{{ trans('Dashboard/login_trans.Signup_with_Facebook') }}</button>
																	</div>
																	<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																		<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>{{ trans('Dashboard/login_trans.Signup_with_Twitter') }}</button>
																	</div>
																</div>
															</form>
															<div class="main-signin-footer mt-5">
																<p><a href="">{{ trans('Dashboard/login_trans.Forgot_password?') }}</a></p>
																<p>{{ trans("Dashboard/login_trans.Don't_have_an_account?") }}  <a href="{{ url('/' . $page='signup') }}"> {{ trans('Dashboard/login_trans.Create_an_Account') }}</a></p>
															</div>
														</div>
														{{-- form patient --}}
														<div class="loginform" id="patient">
															<h5 class="font-weight-semibold mb-4">{{ trans('Dashboard/login_trans.Log_in_as_a_patient') }}</h5>
															<form method="POST" action="{{ route('login.patient') }}">
																@csrf
																<div class="form-group">
																	<label>{{ trans('Dashboard/login_trans.email') }}</label>
																	<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_email') }}" type="email" name="email" :value="old('email')" required autofocus>
																</div>
																<div class="form-group">
																	<label>{{ trans('Dashboard/login_trans.Password') }}</label>
																	<input class="form-control" placeholder="{{ trans('Dashboard/login_trans.Enter_your_password') }}" type="password" name="password" required autocomplete="current-password">
																</div>
																<button {{ __('Log in') }} class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.Sign_In') }}</button>
																<div class="row row-xs">
																	<div class="col-sm-6">
																		<button class="btn btn-block"><i class="fab fa-facebook-f"></i>{{ trans('Dashboard/login_trans.Signup_with_Facebook') }}</button>
																	</div>
																	<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																		<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i>{{ trans('Dashboard/login_trans.Signup_with_Twitter') }}</button>
																	</div>
																</div>
															</form>
															<div class="main-signin-footer mt-5">
																<p><a href="">{{ trans('Dashboard/login_trans.Forgot_password?') }}</a></p>
																<p>{{ trans("Dashboard/login_trans.Don't_have_an_account?") }}  <a href="{{ url('/' . $page='signup') }}"> {{ trans('Dashboard/login_trans.Create_an_Account') }}</a></p>
															</div>
														</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
	<script>
		$('#sectionChooser').change(function(){
		var myID = $(this).val();
		$('.loginform').each(function(){
		myID === $(this).attr('id') ? $(this).show() : $(this).hide();
		});
	});
	</script>
@endsection