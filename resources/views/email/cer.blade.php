<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cer</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400&display=swap" rel="stylesheet">
</head>
<body style="width:100%;margin:auto;text-align:center">
<a href="" title="logo" target="_blank">
    <img  style="max-height: 200px ;width: 100%;height: 100%" src="{{asset('storage/images').'/'.$day->bg_image}}" title="logo" alt="logo">
</a>
<br>
<br>
<br>

{!! $config->confirm_content !!}
<a href="{{ $url }}" style="width:100%;margin:auto;">
  اضغط هنا
</a>
</body>
</html>
