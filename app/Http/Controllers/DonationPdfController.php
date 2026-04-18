<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;

class DonationPdfController extends Controller
{
    public function preview(Donation $donation)
    {
        return view('pdf.preview', [
            'donation' => $donation,
            'config'   => Setting::current(),
        ]);
    }

    public function certificado(Donation $donation)
    {
        $pdf = Pdf::loadView('pdf.certificado-donacion', [
            'donation' => $donation,
            'config'   => Setting::current(),
        ])->setPaper('a4', 'portrait');

        $filename = 'certificado-donacion-' . str($donation->company_name)->slug() . '.pdf';

        return $pdf->stream($filename);
    }

    public function documentoSoporte(Donation $donation)
    {
        $pdf = Pdf::loadView('pdf.documento-soporte', [
            'donation' => $donation,
            'config'   => Setting::current(),
        ])->setPaper('a4', 'portrait');

        $filename = 'documento-soporte-' . str($donation->company_name)->slug() . '.pdf';

        return $pdf->stream($filename);
    }
}
