<!DOCTYPE html>
<html lang="ar">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="HTML5 Template" />
<meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
<meta name="author" content="potenzaglobalsolutions.com" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="{{ URL::asset('admin/css/load.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
table td{padding: 2%}
</style>

</head>

<body dir="rtl" style="background-color: #f4f4f4">

<div class="wrapper" style="font-family: 'Cairo', sans-serif">

@include('layouts.main-header')


<br>
<br>
@yield('content')
<div  id="Container"style="background-color: whitesmoke">


@if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

<div style="background-color: white ; max-width: 700px;
    margin: auto; display: none ;text-align: center ; padding: 3%" id="sucsses"><h1>تم تسجيلكم  بنجاح</h1>
    <h3>شكرا لاهتمامكن بالمشاركة بفعالية {{$day->name}}</h3>

</div>
<div id="details" >
<table class="jl-table jl-table-small jl-table-divider jl-table-striped" style="margin-bottom: 20px;background: white;max-width: 800px;
margin-right: auto; margin-left: auto;">
<thead>
<tr style="background:#6666cc;color:white !important;">

<th colspan="2" style="padding: 2%; color:white !important;text-align: center;"><span style="color:white !important;text-align:center !important;font-size:22px"> {{$day->name}} </span>
</th>



</tr>
</thead>
<tbody>

<tr>

<td colspan="2"> مرحبًا بكم في صفحة التسجيل لحضور فعالية {{$day->name}}
</td>


</tr>
<tr>
<td>الوصف:</td>
    <td colspan="2">  {{$day->description}}
    </td>


</tr>


<tr>
<td>التاريخ :</td>
<td> {{$day->date}}
</td>



</tr>
<tr>
<td>الوقت :</td>
<td> {{$day->time}}
</td>



</tr>

<tr>
<td>المنطقة والموقع :</td>
<td>المنطقة: {{$day->place->name}}
الموقع: {{$day->location}}
</td>


</tr>


</tbody>
</table>
</div>
<div id="storeform" style= "  background-color: white; border: 1px solid #969696;
text-align: center;max-width: 800px ;margin:auto"   >
<div id="result"></div>

    <form id="store"  >

    <div class="row-fluid nav">
<div class="span6 pull-right">
</div>
<div class="span6">
</div>
</div>


<legend class="legend">سجل الآن</legend>
        <input type="hidden" class="form-control" id="day_id" name="day_id" value="{{$day->id}}" >

    <div class="form-group mb-3">
        <label for="name">الاسم</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name" placeholder="الاسم">
    </div>
    <div class="form-group mb-3">
        <label for="email" class="form-label">البريد الالكتروني</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="البريد الالكتروني">
    </div>

    <div class="form-group mb-3">
        <label  for="mobile" class="form-label">الجوال</label>
      <div class="input-group">        <input maxlength="9" type="text" name="mobile" class="form-control" placeholder="الجوال" aria-label="mobile" aria-describedby="basic-addon1">
        <span class="input-group-text" id="basic-addon1">966+</span>

    </div></div>
    <div class="form-group mb-3">
        <label for="id_number" class="form-label">الرقم الوطني</label>
        <input type="text" name="id_number" class="form-control" id="id_number" placeholder="الرقم الوطني">
    </div>
    <div class="form-group mb-3">
        <label for="id_number" class="form-label">العمر</label>
        <select  name="age" class="form-control" id="age" >
            <option value="15-20" >15-20سنة </option>
            <option value="25-35" >25-35سنة </option>
            <option value="35-45" >35-45سنة </option>
            <option value="45-55" >45-55سنة </option>
            <option value="55-65" >55-65سنة </option>
        </select>    </div>

    <div class="form-group mb-3">
        <label for="area" class="form-label">المنطقة</label>
        <select  name="area" class="form-control" id="area" >
       @foreach($places as $place)
<option value="{{$place->name}}">{{$place->name}}</option>
            @endforeach
        </select>    </div>
    <div class="form-group mb-3">
        <label for="id_number" class="form-label">الجنسية</label>
        <input type="text" name="country" class="form-control" id="country" placeholder="الجنسية">
    </div>

    <div class="form-group mb-3">
        <label for="gender" class="form-label">الجنس</label>
        <select  name="gender" class="form-control" id="gender" >
        <option value="male" >ذكر</option>
            <option value="female" >انثى</option>


        </select>      </div>
    <div class="form-group mb-3">
        <label for="work" class="form-label">العمل</label>
        <select  name="work" class="form-control" id="work" >
            <option value="أعمل">أعمل</option>
            <option value=" لا أعمل">لاأعمل</option>
            <option value="أخرى">أخرى</option>

        </select>
    <input id="work1" name="work1" class="form-control" style="display: none">
    </div>

<div>
    <button id="conf" class="btn btn-primary">تسجيل</button>
</div>
<br>

</form>
</div>

<!--=================================
wrapper -->

<!--=================================
footer -->
<div>&nbsp</div>
</div><!-- main content wrapper end-->
</div>

<!--=================================
footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

        $('#work').on('change',function (){
           if($('#work').val()=='أخرى')
           {
               $('#work1').show();
           }else {

               $('#work1').hide();
var f=document.getElementById('work1');
f.value=null;
           }})
    // Submit Form
        $('#store').on('submit', function (event) {
            event.preventDefault();
console.log('afef');
$('#conf').hide();
            $.ajax({
                url: "{{ route('ExternalInviteStore') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function (data) {
                    var html = '';
                    console.log('afef');

                    if (data.errors) {
                        console.log('afef');

                        html = '<div class="alert alert-danger">';
                        for (var count = 0; count < data.errors.length; count++) {
                            html += '<p><i class="bx bx-error font-size-16 align-middle mr-1"></i>' + data.errors[count] + '</p>';

                        }
                        html += '</div>';
                        $('#result').html(html);

                    }
                    if (data.success) {
console.log(data);
$("#details").hide();
$('#storeform').hide();
$('#sucsses').show();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);

                    $('#form_result').html(errorThrown);
                   }
            });
        });





    });
</script>

</body>

</html>
