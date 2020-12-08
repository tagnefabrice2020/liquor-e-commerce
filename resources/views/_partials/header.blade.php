<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control" content="max-age=604800" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>

<link href="{{asset('images/logo/favicon.png')}}" rel="shortcut icon" type="image/x-icon">

<!-- jQuery -->
<script src="{{asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

<!-- Bootstrap4 files-->
<script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css"/>


<!-- Font awesome 5 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

<!-- GT America font type -->
<link href="https://db.onlinewebfonts.com/c/031da03967812d134ed68febd3ba78a9?family=GT+America" rel="stylesheet" type="text/css"/>

<!-- custom style -->
<link href="{{asset('css/ui.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

<link rel="stylesheet" type="text/css" href="{{asset('css/owl.carousel.min.css')}}">
{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/owl.theme.default.min.css')}}"> --}}

<!-- custom javascript -->
<script src="{{asset('js/script.js')}}" type="text/javascript"></script>

<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
{{-- @yield('scripts') --}}
<script src="{{asset("js/owl.carousel.min.js")}}"></script>

 @livewireStyles
</head>
