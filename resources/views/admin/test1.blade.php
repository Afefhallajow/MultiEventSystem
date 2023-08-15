
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Event Reg</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Montserrat:wght@100&family=Poppins:wght@400;500;600&family=Roboto+Serif:wght@100&display=swap" rel="stylesheet">
    <!-- <link href="https://fonts.cdnfonts.com/css/frutiger-lt-std-2" rel="stylesheet"> -->
    <link href="//db.onlinewebfonts.com/c/593331e50d21b6415d53fc7c416b5b8e?family=FrutigerLTArabic-75Black" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <link href="//db.onlinewebfonts.com/c/8e84296a186f1941f28261b7dc98a78b?family=FrutigerLTArabic-45Light" rel="stylesheet" type="text/css"/>


    <style>
        @import  url(//db.onlinewebfonts.com/c/593331e50d21b6415d53fc7c416b5b8e?family=FrutigerLTArabic-75Black);
        @import url(//db.onlinewebfonts.com/c/8e84296a186f1941f28261b7dc98a78b?family=FrutigerLTArabic-45Light);
    </style>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .iti.iti--allow-dropdown.iti--separate-dial-code{
            width: 100%;
            margin-top:2px;
        }
        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        * {
            margin: 0;
            padding: 0
        }
        .invalidEmailMSG{
            visibility: hidden;
        }
        .footer__heading::after{
            content: '';
        }
        .inBahreenSelect,.passportImageDiv{
            display: none;
        }
        .fit-image{
            display: none;
        }
        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100% !important;
            margin-right:-2%;
        }
        .filter-option {
            font-size: .9rem;
            color: #000;
        }
        html {
            height: 100%
        }

        #grad1 {
            background-color: #fff;
            background-image: linear-gradient(120deg, #fff, #fff);
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }
        .form-control{
            padding: 2px;
            font-size: 13px;
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            color: #2C3E50;
            font-size: 12px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #4796b9;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 22px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey;
            display: flex;
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f2c2"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f2c1"
        }
        #progressbar #services:before {
            font-family: FontAwesome;
            content: "\f64a"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #c9a73a;
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }
        *{
            font-family: 'FrutigerLTArabic-75Black', sans-serif;

        }

        @font-face {font-family: "FrutigerLTArabic-75Black"; src: url("//db.onlinewebfonts.com/t/593331e50d21b6415d53fc7c416b5b8e.eot"); src: url("//db.onlinewebfonts.com/t/593331e50d21b6415d53fc7c416b5b8e.eot?#iefix") format("embedded-opentype"), url("//db.onlinewebfonts.com/t/593331e50d21b6415d53fc7c416b5b8e.woff2") format("woff2"), url("//db.onlinewebfonts.com/t/593331e50d21b6415d53fc7c416b5b8e.woff") format("woff"), url("//db.onlinewebfonts.com/t/593331e50d21b6415d53fc7c416b5b8e.ttf") format("truetype"), url("//db.onlinewebfonts.com/t/593331e50d21b6415d53fc7c416b5b8e.svg#FrutigerLTArabic-75Black") format("svg"); }
        @font-face {font-family: "FrutigerLTArabic-45Light"; src: url("//db.onlinewebfonts.com/t/8e84296a186f1941f28261b7dc98a78b.eot"); src: url("//db.onlinewebfonts.com/t/8e84296a186f1941f28261b7dc98a78b.eot?#iefix") format("embedded-opentype"), url("//db.onlinewebfonts.com/t/8e84296a186f1941f28261b7dc98a78b.woff2") format("woff2"), url("//db.onlinewebfonts.com/t/8e84296a186f1941f28261b7dc98a78b.woff") format("woff"), url("//db.onlinewebfonts.com/t/8e84296a186f1941f28261b7dc98a78b.ttf") format("truetype"), url("//db.onlinewebfonts.com/t/8e84296a186f1941f28261b7dc98a78b.svg#FrutigerLTArabic-45Light") format("svg"); }


        @media screen and (max-width: 600px) {


            #progressbar li {

                font-size: 10px;

            }

            .fs-title {
                font-size: 18px;

            }

            .msg-content h5{
                font-size:3vw;
            }

            #progressbar li:before {

                display: block;
                font-size: 12px;

            }

            #msform input,
            #msform textarea {

                font-size: 12px;
                letter-spacing: 0px
            }

            .form-control {

                padding: 2px;
                font-size: 12px;

            }

            label.float-right,label.labelFloatRight {
                font-size: 12px;
            }


            .col-md-6.mobile-clas {
                text-align: right;
                margin-bottom: 12px;
            }

            .fit-image {
                width: 100%;
                object-fit: cover;


            }


            .row.box {
                display: flex;
                flex-direction: row-reverse;
            }


            .col-md-6.div1 {
                order: 1;
            }



        }

        section.footer {
            background-color: #0c0c0c;


            background-repeat: no-repeat;
            background-attachment:inherit ;
            background-size: cover;



            position: relative;
            font-family: 'Poppins';
            padding:12px 0px;
        }
        section.header {


            background-color:#fff;
            background-repeat: no-repeat;
            background-attachment:inherit ;
            background-size: cover;
            text-align: center;


            position: relative;
            font-family: 'Poppins';
            padding:10px 0px;
        }
        .fa {
            margin-top:8px !important;
        }
        .footer__content{
            padding: 25px;
            text-align: center;
            color: #fff;


        }
        .footer__content img{
            width: 5%;
            position: absolute;
            top: -50px;
            border: 1px solid red;
        }
        .footer__heading{
            position: relative;
        }
        .footer__heading h2 {
            background-color: #0c0c0c;
            display: inline-block;
            padding: 0px 10px;
            /* border: 1px solid; */
            position: relative;
            z-index: 9999;
        }
        /*.footer__heading::after {*/
        /*    content: "";*/
        /*    position: absolute;*/
        /*    left: 50%;*/
        /*    top: 45%;*/
        /*    height: 5px;*/
        /*    margin: 0;*/
        /*    border-radius: 50px;*/
        /*    width: 20%;*/
        /*    transform: translate(-50% , -50%);*/
        /*    background-color: rgb(255, 255, 255);*/
        /*}*/
        .footer__content p {
            font-size: 20px;
            font-weight: 500;
            padding: 10px 0px;
            font-family: sans-serif;
        }
        a.mail {
            color: #fff;
        }
        ul.social__media{
            margin:0;
            padding: 0;
            display: inline-block;
            margin-top: 15px;
            display: flex;
            justify-content: center;
        }
        ul.social__media li{
            list-style-type:none;
            display:inline-block;
            margin-right: 15px;
        }
        ul.social__media li a{
            color: #FFF;
            font-size: 20px;
        }
        ul.social__media li {

            text-align: center;
            height: 45px;
            width: 45px;
            border-radius: 50px;
            background-color: #bc9432;
            line-height: 40px;
            border: 2px solid #545d5d;
            box-shadow: 0px 1px #FFF;
            box-shadow: 0 2px 10px -1px rgba(0, 0, 0, 0.55), 0 0px 20px 0px rgba(0, 0, 0, 0.55);
        }

        ul.bus__list{
            padding: 0;
            margin: 0;
        }

        ul.bus__list li{
            list-style-type:none;
            margin-bottom: 5px;
        }



        div#main-menu {
            text-align: center;
        }
        .main-menu {
            text-align: center;
        }

        h2.text-date {
            color: #7ac0bb;
            margin-top: 20px;
            font-family: "FrutigerLTArabic-45Light";
            font-size: 25px;
        }


        img.img-line {
            max-height: 15px;
        }

        .col-md-6.mobile-clas {
            text-align: right;
        }

        .bootstrap-select .dropdown-menu.inner,.filter-option-inner-inner {
            text-align:right;
        }







        .new {
            padding: 20px;
            text-align: right;
        }

        .form-group {
            display: block;
            margin-bottom: 15px;
        }

        .form-group input {
            padding: 0;
            height: initial;
            width: initial;
            margin-bottom: 0;
            display: none;
            cursor: pointer;
        }

        .form-group label {
            position: relative;
            cursor: pointer;
        }

        .form-group label:before {
            content:'';
            -webkit-appearance: none;
            background-color: transparent;
            border: 2px solid #4796b9;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
            padding: 10px;
            display: inline-block;
            position: relative;
            vertical-align: middle;
            cursor: pointer;
            margin-left: 5px;
            margin-right: -2rem !important;
        }

        .form-group input:checked + label:after {
            content: '';
            display: block;
            position: absolute;
            top: 5px;
            right: -22px;
            width: 6px;
            height: 14px;
            border: solid #4796b9;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }





        label.float-right,label.labelFloatRight {
            font-size: 13px;
        }

        .dots-bars-2 {
            margin-top:5rem;
            width: 40px;
            height: 40px;
            --c: linear-gradient(currentColor 0 0);
            --r1: radial-gradient(farthest-side at bottom,currentColor 93%,#c9a73a);
            --r2: radial-gradient(farthest-side at top   ,currentColor 93%,#c9a73a);
            background:
                var(--c) ,
                var(--r1),
                var(--r2),
                var(--c) ,
                var(--r1),
                var(--r2),
                var(--c) ,
                var(--r1),
                var(--r2);
            background-repeat: no-repeat;
            animation: db2 1s infinite alternate;
        }
        @keyframes db2 {
            0%,25% {
                background-size: 8px 0,8px 4px,8px 4px,8px 0,8px 4px,8px 4px,8px 0,8px 4px,8px 4px;
                background-position: 0 50%,0 calc(50% - 2px),0 calc(50% + 2px),50% 50%,50% calc(50% - 2px),50% calc(50% + 2px),100% 50%,100% calc(50% - 2px),100% calc(50% + 2px);
            }
            50% {
                background-size: 8px 100%,8px 4px,8px 4px,8px 0,8px 4px,8px 4px,8px 0,8px 4px,8px 4px;
                background-position: 0 50%,0 calc(0% - 2px),0 calc(100% + 2px),50% 50%,50% calc(50% - 2px),50% calc(50% + 2px),100% 50%,100% calc(50% - 2px),100% calc(50% + 2px);
            }
            75% {
                background-size: 8px 100%,8px 4px,8px 4px,8px 100%,8px 4px,8px 4px,8px 0,8px 4px,8px 4px;
                background-position: 0 50%,0 calc(0% - 2px),0 calc(100% + 2px),50% 50%,50% calc(0% - 2px),50% calc(100% + 2px),100% 50%,100% calc(50% - 2px),100% calc(50% + 2px);
            }
            95%,100% {
                background-size: 8px 100%,8px 4px, 8px 4px,8px 100%,8px 4px,8px 4px,8px 100%,8px 4px,8px 4px;
                background-position: 0 50%,0 calc(0% - 2px),0 calc(100% + 2px),50% 50%,50% calc(0% - 2px),50% calc(100% + 2px),100% 50%,100% calc(0% - 2px),100% calc(100% + 2px);
            }
        }

        div.howYouKnowOther{
            display: none;
        }
        .uploadDiv{
            display: none;
        }
        .if_cluster_div{
            display: none;
        }

        .other_specialty_div,.other_last_Qualification_div,.other_work_location_div{
            display: none;
        }
    </style>
</head>
<body>



<!--<section class="header">-->

<!-- <img class=" rounded float-start" src="public/logo240.png" alt="" width="300" height="240"> -->
<!--   <img  class= "img-svg"  src="public/Assetlogo.png"  width="300" height="300" alt="" >-->
<!--  <h2 class="text-date">07-08-09<br> June 2022 </h2>-->
<!--</section>-->






<!-- MultiStep Form -->
<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-9 text-center p-0 mt-3 mb-2">

            <div class="card px-0 pb-0 mt-3 mb-3" style="margin-top:-3rem">
                <div style="width:100%;text-align:center">
                    <img class="img" src="https://www.gami.gov.sa/themes/custom/gami/images/logo-green.svg" alt="" style="width:50%">
                </div>
                <div class="row">
                    <div class="col-md-12 mx-0">
                        <form id="msform" action="{{ url()->current() }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <fieldset data-set="1">
                                <div class="form-card text-right" style="text-align:start">
                                    <h2 style="text-align:center" class="fs-title"> النتائج بالترتيب </h2>
                                    @foreach($arr as $key => $value)
                                        <div class="" style="text-align:right">

                                            <h2 style="display: inline-block; text-align:right">
                                                في الدرجة{{$key+1}}
                                                :
                                                {{$value->number}}
                                            </h2>
                                            <a href="/gami/deletenumber/{{$value->id}}" style="float: left" class="btn btn-danger delete">حذف </a>

                                        </div>
                                    @endforeach

                                    <div class="new" dir="rtl" >


                                    </div>
                                </div>

                                <p class="errorRquired1" style="color:red"></p>
                                <p class="successMSG" style="color:green"></p>
                            </fieldset>
                        </form>
                    </div>
                </div>

                <!--<img src="public/web-03.png" alt="">-->
            </div>









        </div>
    </div>
</div>



<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js" integrity="sha512-yrOmjPdp8qH8hgLfWpSFhC/+R9Cj9USL8uJxYIveJZGAiedxyIxwNw4RsLDlcjNlIRR4kkHaDHSmNHAkxFTmgg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('.delete')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }
    });
var url=$(this).href;
console.log(url);
    $.ajax({
        'url': url,
        'type': 'GET',
        data: '',
        cache:false,
        contentType: false,
        processData: false,
        success: function (response) {
            arr = response;
location.reload(true);
        }
    });




</script>
<script>
    setTimeout(()=>{
        location.reload(true);
    },5000);
</script>
</body>
</html>
