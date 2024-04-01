<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan QR Code</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        .qr-code {
            width: 300px;
            height: 300px;
            margin-bottom: 20px;
        }

        input[type="file"] {
            display: none;
        }

        label {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        label:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <img class="qr-code" src="{{ asset('f_code.png') }}" alt="QR Code">
        {{-- <br>
        <input type="file" id="qr-input" accept="image/*" capture="environment" onchange="scanQR(event)">
        <label for="qr-input">Scan QR Code</label> --}}
    </div>

    <script>
        function scanQR(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    ctx.drawImage(img, 0, 0);
                    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, imageData.width, imageData.height);
                    if (code) {
                        alert('QR Code scanned successfully: ' + code.data);
                    } else {
                        alert('No QR Code found.');
                    }
                }
                img.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    </script>
</body>

</html>
