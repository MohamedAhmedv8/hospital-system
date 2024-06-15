<meta charset="utf-8">
<title>{{ trans('WebSite/master_trans.title') }}</title>
<!-- Stylesheets -->
<link href="{{ asset('WebSite/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('WebSite/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('WebSite/css/responsive.css') }}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet">
@livewireStyles
<!--Color Switcher Mockup-->
<link href="{{ asset('WebSite/css/color-switcher-design.css') }}" rel="stylesheet">
<!--Color Themes-->
<link id="theme-color-file" href="{{ asset('WebSite/css/color-themes/default-theme.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('WebSite/images/favicon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('WebSite/images/favicon.png') }}" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
{{-- [if lt IE 9]> <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script> <![endif]
[if lt IE 9]> <script src="js/respond.js"></script> <![endif] --}}