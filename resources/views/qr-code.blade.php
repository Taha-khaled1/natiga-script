<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .xh {
            margin-top: 30px
        }

        .center {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>أدخل روابطك</h2>
        <form id="qrForm" action="{{ asset('qr-code/page') }}">
            <input type="text" id="urlInput" name="url" placeholder="ادخل الرابط الخاص بك">
            <input type="submit" value="إرسال">
        </form>
        <div class="xh"> </div>
        @if ($isQr)
            <div class="center">
                <div id="qrCodeContainer"
                    style="background-color: white; padding: 20px; border-radius: 10px; display: inline-block;">
                    {!! $qrQode !!}</div>
            </div>
            <div class="center">
                <button id="downloadBtn"
                    style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; margin-top: 10px;">تحميل
                    QR Code</button>
            </div>
        @endif
    </div>


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
<script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        var qrContainer = document.getElementById('qrCodeContainer');
        domtoimage.toBlob(qrContainer)
            .then(function(blob) {
                var url = window.URL.createObjectURL(blob);
                var a = document.createElement('a');
                a.href = url;
                a.download = 'qr-code.png';
                document.body.appendChild(a);
                a.click();
                window.URL.revokeObjectURL(url);
            });
    });
</script>

</html>
