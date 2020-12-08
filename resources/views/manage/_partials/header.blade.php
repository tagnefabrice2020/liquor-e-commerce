<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />

        <link href="{{asset('images/logo/favicon.png')}}" rel="shortcut icon" type="image/x-icon">

        <script src="{{asset('js/jquery-2.0.0.min.js')}}" type="text/javascript"></script>
        <!-- GT America font type -->
        {{-- <link href="//db.onlinewebfonts.com/c/031da03967812d134ed68febd3ba78a9?family=GT+America" rel="stylesheet" type="text/css"/> --}}
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        @yield('styles')
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//{{Request::getHost()}}:6001/socket.io/socket.io.js"></script>
        <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
        @livewireStyles
    </head>