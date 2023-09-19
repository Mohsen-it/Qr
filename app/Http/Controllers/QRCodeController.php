<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Color\Hex;
class QRCodeController extends Controller
{
    public function generateQRCode(Request $request)
    {
        $data = $request->input('data');
        $size_qr=$request->input('size');

        $backgroundColor = Hex::fromString($request->input('background_color')?? '#ffffff')->toRgb();
        $color = Hex::fromString($request->input('color') ?? '#000000')->toRgb();

        $option = $request->input('op');
        $eye = $request->input('eye');
        $Correction=$request->input('correction');

        $qr_gradient_start = Hex::fromString($request->input('qr_gradient_start') ?? '#000000')->toRgb();
        $qr_gradient_end = Hex::fromString($request->input('qr_gradient_end') ?? '#000000')->toRgb();
        $qr_gradient_type = $request->input('qr_gradient_type') ?? 'vertical';
//////******//////////////////////
//            $logoPath = $request->file('logo');
//      $path= Storage::disk('local')->put('logos',$logoPath );
//
//            $qrCode = QrCode::format('png')
//                ->merge(storage_path($path), 0.3, true)
//                ->size(512)
//                ->generate($data);
//
//            return view('qrcode', ['qrcode' => $qrCode]);

///////////////*/////////////////////////
///
        $qrCode = QrCode::format('png')
            ->merge(public_path('storage/logos/1000.jpg'), 0.3, true)
            ->size(200)
            ->generate('$data');
        return view('qrcode', ['qrCode' => $qrCode]);



//        $qrcode = QrCode::format('png')
//            ->size($size_qr)
//            ->backgroundColor($backgroundColor->red(), $backgroundColor->green(), $backgroundColor->blue())
//            ->color($color->red(), $color->green(), $color->blue())
//            ->style($option)
//            ->gradient($qr_gradient_start->red(), $qr_gradient_start->green(), $qr_gradient_start->blue(),
//                $qr_gradient_end->red(), $qr_gradient_end->green(), $qr_gradient_end->blue(),$qr_gradient_type)
//            ->eye($eye)
//            ->errorCorrection($Correction)
//            ->encoding('UTF-8')
//            ->generate($data);
//        $tempPath = tempnam(sys_get_temp_dir(), 'qrcode');
//        file_put_contents($tempPath, $qrcode);
//        $destinationPath = 'public/img/qrcode.png';
//        Storage::put($destinationPath, file_get_contents($tempPath));
//        unlink($tempPath);

       // return view('qrcode', ['qrcode' => $qrcode]);

    }

    public function phoneQrCode(Request $request)
    {
        $data = $request->input('data');
        $phone = $request->input('phone');
        $qrcode = QrCode::SMS($phone);
        return view('qrcode', ['qrcode' => $qrcode]);
    }


}
