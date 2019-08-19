<meta name="application-name" content="{{ env('app_name') }}">
<meta name="author" content="{{ config('custom.dev_name') }}">
<link rel="author" href="{{ config('custom.dev_url') }}">
<meta http-equiv="content-type" content="text/html">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="canonical" href="{{ url()->current() }}">
<link rel="alternate" hreflang="en" href="{{ url()->current() }}">

<link rel="shortcut icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7CRoboto:300,400,500,600,700">
<link rel="stylesheet" type="text/css" href="{{ asset('metronic/vendors/base/vendors.bundle.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('metronic/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('metronic/demo/default/base/style.bundle.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<script defer src="{{ asset('metronic/vendors/base/vendors.bundle.js') }}"></script>
<script defer src="{{ asset('metronic/demo/default/base/scripts.bundle.js') }}"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
