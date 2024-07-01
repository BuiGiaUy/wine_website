<!DOCTYPE html>
<!--
Template Name: Tinker - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
<!-- BEGIN: Head -->
<head>
    @vite(['resources/js/app.js'])
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

</head>
<!-- END: Head -->
<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
<!-- BEGIN: Mobile Menu -->
@include('partial.admin.mobileMenu')
<!-- END: Mobile Menu -->
<div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
    <!-- BEGIN: Side Menu -->
    @include('partial.admin.sideMenu')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
        @include('partial.admin.topBar')
        <!-- END: Top Bar -->
        <div class="container-fluid">
            @yield("content")
        </div>
    </div>
    <!-- END: Content -->
</div>
<!-- BEGIN: Dark Mode Switcher-->
<div data-url="side-menu-dark-dashboard-overview-3.html"
     class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
    <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
    <div class="dark-mode-switcher__toggle border"></div>
</div>
<!-- END: Dark Mode Switcher-->

<!-- BEGIN: JS Assets-->
@include('partial.admin.bodyJs')
<!-- END: JS Assets-->
</body>
</html>
