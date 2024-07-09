<?php
/*
*
* Trevor's Controller
*
*/
namespace App\Http\Controllers;

use App\Jobs\processQRImage;
use Illuminate\Http\Request;
use App\Models\QRCode;
use Endroid\QrCode\QrCode as EndroidQrCode;
use Endroid\QrCode\Writer\PngWriter;

class QRCodeController extends Controller
{
    public function index($id = null,$title = null)
    {
        return view('generator',['id'=>$id,'title'=>$title]);
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
        
        
        // ALTERNATE DISPLAY METHOD. SHOWS QR CODE IN VIEW FOR BETTER FLOW
        //$result->saveToFile($filePath);//saves file to public.
        //will need to shift to app's public file


        //dispatch(new processQRImage($filePath))->delay(now()->addSecond(1));//queues command to delete file after view is made

        //$displayPath = 'qrcodes/'. $filename;
        //return view('generator',['path' => $displayPath, 'title'=>$qrObj->title]);//returns back to main page and sends filepath for qr code
        //

        return response()->file($filePath)->deleteFileAfterSend();//displays image in browser
    }

    public function download($id){
        $qrCode = QRCode::findOrFail($id);

        $qrImg = new EndroidQrCode(route('scan', $id)); // Point QR code to scan route
        $writer = new PngWriter();

        $result = $writer->write($qrImg);

        $filename = 'qrcode-' . $qrCode->id . '.png';
        $filePath = public_path('qrcodes/' . $filename);
        file_put_contents($filePath, $result->getString());//puts contents in public folder temporarily

        return response()->file($filePath)->deleteFileAfterSend();//displays image in browser
    }

    public function edit(Request $request, $id){
        $request->validate([
            'title' => 'required|string|max:255',
            'url' => 'required|url|max:255',
        ]);


        $qrCode = QRCode::findOrFail($id);

        $qrCode->title = $request->title;
        $qrCode->url = $request->url;

        $qrCode->save();

        return redirect()->route('menu');

    }

    public function scan($id)
    {
        $qrcode = QRCode::findOrFail($id);
        $qrcode->increment('scan_count');

        return redirect($qrcode->url);
    }

    public function delete($id){
        $qrcode = QRCode::findOrFail($id);

        $qrcode->delete();
        return redirect()->route('menu');
    }
}
