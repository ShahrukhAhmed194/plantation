<?php

namespace App\Http\Controllers;

use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\{GiftRequest, TreeProfile, TreeTimelineImage};
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function downloadPDF($gift_id)
    {
        $gift_request = GiftRequest::find($gift_id);
        $uuid = $gift_request->assignedTree->uuid;
        $qrCode = base64_encode(QrCode::format('svg')->size(75)->generate(url('/tree-profile',$uuid)));
        $data = [
            'sender' => 'Gift From ' . $gift_request->senderInfo->name,
            'qrCode' => $qrCode
        ];
        $html = view('pdf.certificate', $data)->render();
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('tree_certificate_'.$gift_request->receiver_name.'.pdf', 'S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename=tree_certificate_'.$gift_request->receiver_name.'.pdf');
    }

    public function goToQRCodeTreePage($uuid)
    {
        $tree = TreeProfile::where('uuid', $uuid)->first();
        $timelines = TreeTimelineImage::where('tree_id', $tree->id)->get();
        return view('tree.qrcode', compact('tree', 'timelines'));
    }
}