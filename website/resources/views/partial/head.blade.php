@vite(['resources/js/app.js'])
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.7.6/dist/css/uikit.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<style>
    .link-p {
        text-decoration: none;
        color: #990d23 !important;
    }
    .link-p:hover {
        text-decoration: none;
        color: #0a53be !important;
    }
    .uk-textarea {
        border: 1px solid #b4975a !important;
        border-radius: 5px;
        height: 3.0084em !important;
        transition: box-shadow 0.3s ease-in-out; /* Smooth transition for shadow effect */
        min-height: 120px;
        padding-top: 10px;
    }
    .uk-input {
        border: 1px solid #b4975a !important;
        border-radius: 5px;
        height: 3.0084em !important;
    }
    .uk-input:focus {
        border: 1px solid #990d23;
        box-shadow: 0 0 4px rgba(255, 0, 0, 0.5); /* Red shadow */
    }


    .uk-accordion-title {
        padding: 10px;
        font-size: 18px ;
    }
    .uk-accordion-title:active, .uk-accordion-title:focus {
        background-color: rgba(0, 0, 0, .03);
        border-color: #990d23;
        color: #990d23;
        font-weight: 500;
    }
    .uk-accordion >li{
        margin-top: 0 !important;

    }
    .uk-accordion >li div{
        margin-left: 15px;
    }

    .uk-link-text {
        text-decoration: none !important;
    }
    /* Custom style for dropdown background color */
    .uk-navbar-container{
        background-color: #990d23 !important; /* Color you want to apply */
    }

    /* Adjust text color for better readability */
    .uk-navbar-nav > li > a, .uk-navbar-item > a {
        color: #fff !important;
        font-weight: 500;
    }

    /* Custom font size for dropdown items */
    .uk-nav uk-navbar-dropdown-nav {
        font-size: 0.9em !important;
    }
    /* Custom line height for dropdown items */
    .uk-nav uk-navbar-dropdown-nav li a {
        line-height: 60px !important;
    }
</style>
<style>
    .uk-heading-line > span {
        color: #990d23;
    }
    #footer h4 {
        color: #990d23;
        font-size: 16px;
        line-height: 28px;
        font-family: "Lora", sans-serif;
        font-weight: 400;

        letter-spacing: 1.2px;
        text-transform: uppercase;
    }
    #footer h3 {
        color: #0A0A0A;
        font-weight: 500;
        font-size: 1.25em;
    }
    #footer p {
        font-family: "Inter", sans-serif;
        font-weight: 400;
        font-size: 14px;
        line-height: 24px;
        color: #191919;
    }
    #footer h3 > span{
        color: #990d23;
    }
    #footer a.uk-link-text {
        color: black;
    }
    #footer a.uk-link-heading {
        color: black;
    }
    #footer .uk-icon-button {
        color: #990d23;
    }
    #footer {
        color: #000000;
        background: #f7f7f7;
    }
    .border {
        background: #f7f7f7;
        margin: 0 50px ;
        height: 0;
        border-bottom: 1px dotted #990d23 !important;
    }
    body {

    }
</style>
