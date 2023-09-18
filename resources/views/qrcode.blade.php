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
    <form method="POST" action="{{ route('generate-qrcode') }}">
        @csrf
        <div class="form-control">
            <label for="background_color">Background Color:</label>
            <input type="color" name="background_color" id="background_color">
        </div>
        <div class="form-control">
            <label for="color">Color:</label>
            <input type="color" name="color" id="color">
        </div>
        <div class="form-control">
            <label for="data">Text:</label>
            <input type="text" name="data" id="data">
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
            <button type="submit">Create QR</button>
        </div>
    </form>
    @if(isset($qrcode))
        <img src="data:image/png;base64,{{ $qrcode }}" alt="Qr Code">
    @endif
</div>
</body>
</html>

{{--<form method="POST" action="{{ route('phone-qrcode') }}">--}}
{{--@csrf--}}
{{--    <div class="form-control">--}}
{{--        <label for="data">message</label>--}}
{{--        <input type="text" name="data" id="data">--}}
{{--    </div>--}}
{{--    <div class="form-control">--}}
{{--        <label for="phone">Phone number</label>--}}
{{--        <input type="number" name="phone" id="phone">--}}
{{--    </div>--}}
{{--    <div class="form-control">--}}
{{--        <button type="submit">Create QR</button>--}}
{{--    </div>--}}
{{--</form>--}}
