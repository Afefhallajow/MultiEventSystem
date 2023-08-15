<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        *{margin: 0;padding: 0;}
        img.heading-image{width:100%;}
        img.footer-image{width:100%;}
        form{ padding: 1rem 0; }
        input{ margin: 1rem 0; }
        .bahreen{
            display: none;
        }
        #msg,#msg2{ display: none; }
        h4{ color:#c39e36 }
        .col-md-6{
            text-align:right;
        }
        label{
            font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header row">
            <div class="col-md-12" style="text-align: center;">
                <img class="heading-image" src="public/web-07.png" alt="">
            </div>
            <div class="col-md-12">
                <h4 style="text-align:center">يرحى إدخال بيانات الحوالة الخاصة بك</h4>
                <h4 style="text-align:center">
                {{$code->name}}</h4>
                <form action="{{ url()->current() }}" method="post" dir="rtl" enctype="multipart/form-data">
                    @csrf
                    <div class="form-goup row">
                        <div class="col-md-6">
                            <label for="money">المبلغ</label>
                            <input type="number" name="money" required id="money" class="form-control" placeholder="المبلغ">
                        </div>
                        <div class="col-md-6">
                            <label for="sender">المرسل</label>
                            <input type="text" name="sender" required id="sender" class="form-control" placeholder="المرسل">
                        </div>
                        <div class="col-md-6">
                            <label for="datee">تاريخ الحوالة</label>
                            <input type="date" name="datee" required id="datee" class="form-control" placeholder="تاريخ الحوالة ">
                        </div>
                        <div class="col-md-6">
                            <label for="bank">اسم البنك</label>
                            <input type="text" name="bank" required id="bank" class="form-control" placeholder="اسم البنك ">
                        </div>
                        <div class="col-md-12">
                            <label style="float:right" for="remittanceFile"> صورة الإيصال</label>
                            <input type="file" name="remittanceFile" required id="remittanceFile" class="form-control">
                        </div>
                    <div class="col-md-12" style="text-align: right;">
                        <button class="btn btn-primary btn-block" style="background-color: #c39e36;border:none;font-size:1.2rem">تسجيل</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12" style="text-align: center;">
                <img class="footer-image" src="public/web-03.png" alt="">
            </div>
            
        </div>
    </div>
  
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>