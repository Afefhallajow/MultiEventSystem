
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <meta name="description" content="بوابة وزارة الموارد البشرية والتنمية الاجتماعية في المملكة العربية السعودية" />
   <meta name="abstract" content="أنشئت وزارة العمل والتنمية الاجتماعية بموجب المرسوم الملكي الكريم الذي صدر في الشهر الأخير من عام 1380 هـ، وذلك تحت اسم وزارة العمل والشؤون الاجتماعية، وقامت الوزارة منذ نشأتها بتنمية المجتمعات المحلية واهتمت بلجان المجتمع ومجالس المحافظات والمراكز والهجر ورعاية الشباب والأسرة والجمعيات التعاونية، وحددت الوزارة أهدافها" />
   <meta name="keywords" content="العمل,التنمية,الضمان,الرعاية,وزراة العمل" />

   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('images') }}/fav.png">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>@yield('title')</title>

   <!-- DataTables -->

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
   <link href="{{ asset('admin') }}/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin') }}/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   <!-- Responsive datatable examples -->
   <link href="{{ asset('admin') }}/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   <!-- Bootstrap Css -->
   <link href="{{ asset('admin/css') }}/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />

   <!-- ColorPicker -->
   <link href="{{ asset('admin') }}/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />

   <!-- Datepicker -->
   <link href="{{ asset('admin') }}/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
   <link href="{{ asset('admin') }}/libs/@chenfengyuan/datepicker/datepicker.min.css" rel="stylesheet" type="text/css" />

   <!-- twitter-bootstrap-wizard css -->
   <link rel="stylesheet" href="{{ asset('admin') }}/libs/twitter-bootstrap-wizard/prettify.css">

   <!-- Icons Css -->
   <link href="{{ asset('admin/css') }}/icons.min.css" rel="stylesheet" type="text/css" />

   <!-- App Css-->
   <link href="{{ asset('admin/css') }}/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

   <!-- Styles -->
   <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

   <!-- Translation -->
   <span id="Forbidden" translation="{{ __('dashboard.Forbidden') }}"></span>
    <style>
        .page-item.active .page-link {
            background-color: rgb(20, 130, 135) !important;
            border-color: rgb(20, 130, 135) !important;
        }
        .topnav .navbar-nav .dropdown.active > a {
            color: rgb(20, 130, 135) !important;
            border-color: rgb(20, 130, 135) !important;
        }
        .topnav .navbar-nav .dropdown-item.active, .topnav .navbar-nav .dropdown-item:hover {
            color: rgb(20, 130, 135) !important;
        }
        .dataTables_wrapper .dt-buttons{
            float:left;
margin-right: 3%        }
        #records_table_filter{
            float: left;
            margin-top: 2%;
        }
    </style>
    @yield('css')
</head>

<body class="<?php echo \Lang::locale() == 'ar' ? 'arabic' : 'english'; ?>" data-topbar="dark" style="min-height: auto" data-layout="horizontal">
   <!-- Loader -->
   @include('admin.includes.loader')

   <div id="layout-wrapper">
      @include('admin.includes.header')
       @include('admin.includes.sidemenu')

          <div class="main-content">
         @yield('content')

         @include('admin.includes.footer')
      </div>
   </div>
</body>

</html>
