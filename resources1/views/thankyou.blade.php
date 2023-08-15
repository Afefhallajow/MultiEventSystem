
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Form - Tawuniya</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/form')}}/css/style.css">
</head>
<style>
    .container {
  width: 1416px;
  position: relative;
  margin: 0 auto;
    margin-top: 0px;
  background: #fff0;
  border-radius: 25px;
  padding-top: 210px;
  margin-top: 250px;
}
@media screen and (max-width: 992px) {
  .container {
    width: calc(100% - 40px);
    max-width: 100%;
    margin-top: 20px;
} }

.form-control {
  display: block;
  width: 100%;
  padding: .375rem .75rem;
    padding-top: 0.375rem;
    padding-bottom: 0.375rem;
    padding-left: 0.75rem;
  font-size: 1.3rem;
  font-weight: 500;
  line-height: 1.5;
  color: #332f52;
  background-color: #fdfdff8f;
  background-clip: padding-box;
  border: var(--bs-border-width) solid #635ca76e;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 1rem;
  transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  margin-top: 10px;
  margin-bottom: 10px;
  padding-left: 17px;
  padding-top: 10px;
  padding-bottom: 10px;
}

[type="button"]:not(:disabled), [type="reset"]:not(:disabled), [type="submit"]:not(:disabled), button:not(:disabled) {
  cursor: pointer;
  float: right;
  background-color: #fdfdff8f;
  border: var(--bs-border-width) solid #635ca76e;
  color: #332f4f;
  padding: 12px;
  padding-left: 25px;
  padding-right: 25px;
  font-size: 1.3rem;
  border-radius: 1rem;
}
.bggg {

  border-radius: 6px;
}
</style>
<body style="background-image: url({{asset('public/form/images/Portals.png')}});  background-repeat: no-repeat; background-size: cover;">

    <div class="main">
        <div class="container">
            <div class="signup-content">

                <div class="signup-form">




                    <div class="row align-items-center">
                      <div class="col-10 col-2">


                      </div>
                      <div class="col-12 col-10 text-thank ">
                        <h2 style="font-size: 28px;color: #322f52;"> registration is completed</h2>
                        <h2 style="color: #8074b4;font-weight: 400;font-size: 33px;"> we look forward to your participation </h2>
                        <h2 style="color: #8074b4;font-weight: 400;font-size: 35px;"> in  <span style="color: #8074b4;font-weight: 700;font-size: 30px;">Tawuniya Iftar Ramadan </span></h2>
                        <h2 style="color: #8074b4;font-weight: 400;font-size: 35px;" >to download QrCode </h2>
                          <div style="margin-left: 20%">

                      <h2 style="color: #8074b4;font-weight: 700;font-size: 35px;" >  <a target="_blank" href="{{$link}}">click here </a>
                          </h2>
                    </div>
                      </div>
                      <div class="col">

                      </div>
                    </div>




                </div>
            </div>
        </div>

    </div>
<script>window.print()</script>
    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    <script src="{{asset('public/form')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('public/form')}}/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
