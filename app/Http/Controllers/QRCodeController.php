<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        $data = $request->input('data');
        $backgroundColor = $request->input('background_color');
        $color = $request->input('color');
        $option = $request->input('op');
        $eye = $request->input('eye');
        $Correction=$request->input('correction');

        $hexColor = ltrim($backgroundColor, '#');
        $red = hexdec(substr($hexColor, 0, 2));
        $green = hexdec(substr($hexColor, 2, 2));
        $blue = hexdec(substr($hexColor, 4, 2));

        $Color = ltrim($color, '#');
        $red_c = hexdec(substr($Color, 0, 2));
        $green_c = hexdec(substr($Color, 2, 2));
        $blue_c = hexdec(substr($Color, 4, 2));

        $from = [255, 0, 0];
        $to = [0, 0, 255];

        $qrcode = QrCode::size(200)
            ->backgroundColor($red, $green, $blue)
            #->gradient($from[0], $from[1], $from[2], $to[0], $to[1], $to[2], 'diagonal')
            ->color($red_c, $green_c, $blue_c)
            ->style($option)
            ->eye($eye)
            ->merge('/storage/app/1000.jpg')
            ->errorCorrection($Correction)
            ->encoding('UTF-8')
            ->generate($data);

        return view('qrcode', ['qrcode' => $qrcode]);
    }

    public function phoneQrCode(Request $request)
    {
        $data = $request->input('data');
        $phone = $request->input('phone');
        $qrcode = QrCode::SMS($phone);
        return view('qrcode', ['qrcode' => $qrcode]);
    }


}
