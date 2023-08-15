
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
    .badge-content{
        max-width: 75%;
margin: auto;
background-color: white;

    }
@media print {
@page{
    margin: 20% 0;
}
}

</style>
</head>

<body dir="rtl" style="background-color: #f4f4f4">
<div class="badge-content " style="text-align: center">
 @if($type ==1)
    <div class="image"> <img style="max-height: 200px" src="{{asset('storage/images').'/'.$day->bg_image}}" width="100%" height="10%" > </div>

<div class="row">
    <div style="max-width: 90%;margin-right: 5% " class='row type alert alert-primary '>
    <h3>{{$item->invitation_type}}</h3>
    </div>

</div>
    <br>
<div class="row">
    <p>{{$item->name}}</p>

</div>
    <div class="row">
        <p>

            {!! QrCode::size(100)->generate($item->id) !!}
        </p>

    </div>
        <div style="width: 100% ;height:40px ;background-color: #0a53be " class="footer">

        </div>
    @else
        <div class="row">
            <div style="max-width: 90%;margin-right: 5% " class='row type alert alert-primary '>
                <h3>{{$item->invitation_type}}</h3>
            </div>

        </div>
        <br>
        <div class="row">
            <p>{{$item->name}}</p>

        </div>
        <div class="row">
            <p>

                {!! QrCode::size(100)->generate($item->id) !!}
            </p>

        </div>

    @endif
</div>
<script>window.print()</script>
</body>

</html>
