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
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include("content.includes.head")
    @yield("style")
</head>
<!-- END: Head -->
<body class="uk-margin-remove" >
    {{-- BEGIN:Header --}}
    @include("content.includes.header")
    {{-- END: Header --}}
    <div class="">
        @yield("content")
    </div>
    <!-- BEGIN: Footer -->
    @include('content.includes.footer')
    <!-- END: Footer -->

    <!-- BEGIN: JS Assets-->
    @include('content.includes.bodyJs')
    <!-- END: JS Assets-->
</body>
</html>
