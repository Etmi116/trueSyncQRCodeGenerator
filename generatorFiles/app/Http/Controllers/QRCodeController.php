<?php
/*
*
* Trevor's Controller
*
*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QRCode;
use Endroid\QrCode\QrCode as EndroidQrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeController extends Controller
{
    public function index()
    {
        return view('generator',['path' => 'images\bearchillin.jpg']);
    }

    public function generate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $qrcode = QRCode::create([
            'title' => $request->title,
            'url' => $request->url,
        ]);

        $qrCode = new EndroidQrCode(route('scan', $qrcode->id)); // Point QR code to scan route
        $writer = new PngWriter();

        $result = $writer->write($qrCode);

        $filename = 'qrcode-' . $qrcode->id . '.png';
        $filePath = 'qrcodes/' . $filename;
        //$qrcode->storePath($filePath);//updates file path in db
        $result->saveToFile($filePath);//saves file to public.
        //will need to shift to app's public file

        return view('generator',['path' => $filePath]);//returns back to main page
    }

    public function scan($id)
    {
        $qrcode = QRCode::findOrFail($id);
        $qrcode->increment('scan_count');

        return redirect($qrcode->url);
    }
}
