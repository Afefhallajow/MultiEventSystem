<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <style>
        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
        @page {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            size: landscape;
            -webkit-transform: rotate(90deg);
            -moz-transform:rotate(90deg);
            transform:rotate(90deg);
            filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        }

        @media print{@page {size: landscape}}

    </style>
</head>
<body style="text-align:center">
<img src="{{ $imageLink }}" style="width:100%;height:100%;">
</body>
</html>
