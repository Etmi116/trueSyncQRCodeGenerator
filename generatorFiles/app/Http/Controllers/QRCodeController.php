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
        return view('generator');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);

        $qrObj = QRCode::create([
            'title' => $request->title,
            'url' => $request->url,
        ]);

        $qrImg = new EndroidQrCode(route('scan', $qrObj->id)); // Point QR code to scan route
        $writer = new PngWriter();

        $result = $writer->write($qrImg);

        $filename = 'qrcode-' . $qrObj->id . '.png';
        $filePath = public_path('qrcodes/' . $filename);
        file_put_contents($filePath, $result->getString());//puts contents in public folder temporarily

        return response()->file($filePath)->deleteFileAfterSend();//displays image in browser
        //return redirect('/')->flash('gg');
    }

    public function scan($id)
    {
        $qrcode = QRCode::findOrFail($id);
        $qrcode->increment('scan_count');

        return redirect($qrcode->url);
    }
}
