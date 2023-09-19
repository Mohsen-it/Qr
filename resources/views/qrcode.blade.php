<!DOCTYPE html>

<head>
    <title>QR Code Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="color"], input[type="text"], select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            height: 40px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Create QR Code</h2>
    <form method="POST" action="{{ route('generate-qrcode') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
            <label for="background_color">Background Color:</label>
            <input type="color" name="background_color" id="background_color"  value="#ffffff">
        </div>
        <div class="form-control">
            <label for="color">Color:</label>
            <input type="color" name="color" id="color"  value="#000000">
        </div>

        <div class="form-control">
            <label for="qr_gradient_start">Gradient start:</label>
            <input type="color" name="qr_gradient_start" id="qr_gradient_start"  value="#000000">
        </div>

        <div class="form-control">
            <label for="qr_gradient_end">Gradient end:</label>
            <input type="color" name="qr_gradient_end" id="qr_gradient_end"  value="#000000">
        </div>

        <div class="form-control">
            <label for="qr_gradient_type">Gradient Type:</label>
            <select name="qr_gradient_type" id="qr_gradient_type">
                <option value="vertical">Vertical</option>
                <option value="horizontal">Horizontal</option>
                <option value="diagonal">Diagonal</option>
                <option value="inverse_diagonal">inverse Diagonal</option>
                <option value="radial">Radial</option>
            </select>

        <div class="form-control">
            <label for="data">Text:</label>
            <input type="text" name="data" id="data" value="Need QR">
        </div>
            <div class="form-control">
                <label for="logo">Logo:</label>
                <input type="file" name="logo" id="logo">
            </div>
        <div class="form-control">
            <label for="op">Style:</label>
            <select name="op" id="op">
                <option value="round">Round</option>
                <option value="dot">Dot</option>
                <option value="square">Square</option>
            </select>
        </div>
        <div class="form-control">
            <label for="eye">Eye:</label>
            <select name="eye" id="eye">
                <option value="square">Square</option>
                <option value="circle">Circle</option>
            </select>
        </div>
        <div class="form-control">
            <label for="correction">Error Correction:</label>
            <select name="correction" id="correction">
                <option value="L">Low</option>
                <option value="M">Medium</option>
                <option value="Q">Quartile</option>
                <option value="H">High</option>
            </select>
        </div>
        <div class="form-control">
            <label for="size">Size:</label>
            <select name="size" id="size">
                <option value="150">150</option>
                <option value="200">200</option>
                <option value="250">250</option>
                <option value="300">300</option>
            </select>
        </div>
        <div class="form-control">
            <button type="submit">Create QR</button>
        </div>
    </form>
    @if(isset($qrCode))
        <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">

    @endif


</div>
</body>
</html>
