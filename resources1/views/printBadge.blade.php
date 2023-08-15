<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Badge</title>
    <style>
        @media print {
            a.pdf{
              visibility: hidden;
            }
            @page {
                size: 8.4cm 8.5cm;
            }
        }
        @font-face {
            font-family: 'Arial';
            src: url({{asset('assets/badge/Arial.ttf')}});
            font-weight: normal;
            font-style: normal;
        }
    </style>
</head>

<body style="padding:0; margin:0; direction:ltr">

<div  style="height:10.0cm;width:8.4cm;margin:auto">
    
       <div id="invitation_infoo">
          
            <div  style="line-height:25px; position:absolute; width:2.8cm;text-align:center; top:1.4cm; color:#000; font-family:Arial; font-size:16pt;">
            </div>
            <div  style="line-height:25px; position:absolute; width:8.8cm;text-align:center; top:5.5cm; color:#000; font-family:Arial; font-size:16pt;">
                {{$member->name}}
            </div>
      
            <div  style="position:absolute; width:8.8cm;text-align:center; top:7.8cm;">
                <img src="data:image/png;base64,{{DNS2D::getBarcodePNG($member->qrcode , 'QRCODE',3,3)}}" alt="barcode" width="90px;"/>
            </div>
            <div  style="line-height:18px; position:absolute; width:8.8cm;text-align:center; top:10.7cm; color:#000; font-family:Arial; font-size:11pt;">
                {{$member->qrcode}}
            </div>
       </div>
        <br>
</div>
    
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script>
    function CreatePDFfromHTML() {
        var HTML_Width = $("#invitation_infoo").width();
        var HTML_Height = $("#invitation_infoo").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;
    
        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
    
        html2canvas($("#invitation_infoo")[0],{scale:0}).then(function (canvas) {
            var imgData = canvas.toDataURL("image/jpeg");
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
            }
            pdf.save("Invitation.pdf");
        });
    }
    </script>
</body>
</html>

