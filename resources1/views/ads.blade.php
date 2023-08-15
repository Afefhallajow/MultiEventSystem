<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Medical Forum</title>
    <!-- CSS only -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">-->
   
    <style>
        *{
           -moz-user-select: none;
           -khtml-user-select: none;
           -webkit-user-select: none;
        
           /*
             Introduced in Internet Explorer 10.
             See http://ie.microsoft.com/testdrive/HTML5/msUserSelect/
           */
           -ms-user-select: none;
           user-select: none;
        }
        h1{
            font-size: 2.5rem;
        }
        @media (min-width: 700px){
            h1,.pa {
                font-size: 4.5rem !important;
            }
        }
    </style>
</head>

<body>

<div class="container">
        <div class="row">
            <div style="text-align:center"><br><br>
                <img src="{{ asset('public/Assetlogo.png') }}" style="width:50%" />     
            </div>
        
            <div style="text-align:center"><br><br>
                <img src="{{ asset('public/WhatsApp Image 2022-05-22 at 11.19.46 PM.jpeg') }}" style="width:50%"><br><br>
                <h1 class="pa" style="direction:rtl;text-align:center;">للتواصل والاستفسار اضغط هنا:
                    <a href="https://wa.me/qr/2YIP5TSXABOFG1"><br><img style="width: 300px" src="{{ asset('public/WhatsApp.svg (1).webp') }}"></a>
                </h1>
            </div>
        </div>
        <div>
            
        </div>
</div>
<!-- JavaScript Bundle with Popper -->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>-->
</body>
</html>

