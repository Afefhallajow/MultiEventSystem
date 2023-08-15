<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title></title>

<!-- Scripts -->
<script src="{{ asset('public/js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Styles -->
<link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
<style>
label,h1,h2,h3,h4,h5,h6,p{
color: #5b64ad;
font-weight:bold;
}
button{
font-weight:bold;
}
body::-webkit-scrollbar {
width: 12px;               /* width of the entire scrollbar */
}

body::-webkit-scrollbar-track {
background: #fff;        /* color of the tracking area */
}

body::-webkit-scrollbar-thumb {
background-color: #4d4297;    /* color of the scroll thumb */
border-radius: 20px;       /* roundness of the scroll thumb */
border: 3px solid #fff;  /* creates padding around scroll thumb */
}

</style>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
<style>
*{font-family: 'Cairo', sans-serif;
}
</style>
</head>
<body>
<div id="app">

<main class="py-4">











<div class="container" style="margin-top:50px">
<div class="row">
<div class="col-lg-6" dir="rtl">
<h2>النتيجة ستكون كما يلي: </h2>
<img src="{{asset('textEample/'.$day->image)}}" style="width:100%;height:100%" alt="">
</div><br>
<div class="col-lg-6">
<h1 class="text-center text-danger;" style="visibility:hidden">Text On Image</h1>

<div class="form-group" dir="rtl">
<h3>صورة جديدة</h3>
<form action="{{ url()->current() }}" method="post" enctype='multipart/form-data'>
@csrf
<div class="form-group">
<div class="row">
<div class="col-lg-6">
<label for="xpo">المركز-X</label>
<input type="number" name="xpo" value="{{$imageSetting->xpo}}" id="xpo" class="form-control"><br>
</div>
<div class="col-lg-6">
<label for="ypo">المركز-Y</label>
<input type="number" name="ypo" value="{{$imageSetting->ypo}}" id="ypo" class="form-control"><br>
</div>
</div>
</div>
<div class="form-group">
<div class="row">
<div class="col-lg-6">
<label for="size">الحجم</label>
<input type="number" name="size" value="{{$imageSetting->size}}" placeholder="Size" id="size" class="form-control"><br>
</div>
<div class="col-lg-6">
<label for="color">اللون</label>
<select name="color" id="color" class="form-control">
<option value="#000000" {{ $imageSetting->color == '#000000' ? 'selected' : '' }}>Black</option>
<option value="#FFFFFF" {{ $imageSetting->color == '#FFFFFF' ? 'selected' : '' }}>White</option>
<option value="#FF0000" {{ $imageSetting->color == '#FF0000' ? 'selected' : '' }}>Red</option>
<option value="#008000" {{ $imageSetting->color == '#008000' ? 'selected' : '' }}>Green</option>
<option value="#0000FF" {{ $imageSetting->color == '#0000FF' ? 'selected' : '' }}>Blue</option>
</select><br>
</div>
</div>
</div>
<div class="form-group">
</div>
<button class="btn btn-danger mt-3 btn-block" style="background: #4d4297;border: none;width:100%">حفظ</button>
</form>
<hr>
</div>
</div>
<br>
</div>
</div>
<script>
function generate() {
let length = '70';
const characters = 'abcdefghijklmnopqrstuvwxyz123456789';
let result = ' ';
const charactersLength = characters.length;
for(let i = 0; i < length; i++) {
result +=
characters.charAt(Math.floor(Math.random() * charactersLength));
}
document.getElementById("hashLink").value = result
}
</script>
<script>
function CopyToClipboard(id)
{
var r = document.createRange();
r.selectNode(document.getElementById(id));
window.getSelection().removeAllRanges();
window.getSelection().addRange(r);
document.execCommand('copy');
window.getSelection().removeAllRanges();
}
</script>



</main>

<!-- Change Password -->
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
$('#myModal').on('shown.bs.modal', function () {
$('#myInput').trigger('focus')
})
</script>
</body>
</html>
