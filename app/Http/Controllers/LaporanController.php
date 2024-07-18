<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\PaniteraPengganti;
use App\Models\Streaming;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpWord\TemplateProcessor;

class LaporanController extends Controller
{
    public function index()
    {
        $hakim = Hakim::all();
        $pp = PaniteraPengganti::all();
        return view('laporan.index', ['hakim' => $hakim, 'pp' => $pp]);
    }

    public function cetakLaporan(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'tanggal_laporan' => 'required',
            'panitera_muda_hukum' => 'required',
        ]);

        if ($request->hakim == null && $request->pp == null) {
            $data = Streaming::whereMonth('tanggal_sidang', $request->bulan)->whereYear('tanggal_sidang', $request->tahun)->get();
        } elseif ($request->hakim != null && $request->pp == null) {

            $data = Streaming::whereMonth('tanggal_sidang', $request->bulan)->whereYear('tanggal_sidang', $request->tahun)->where(function ($query) use ($request) {
                $query->where('hk', $request->hakim)->orWhere('ha1', $request->hakim)->orWhere('ha2', $request->hakim);
            })->get();
        } elseif ($request->hakim == null && $request->pp != null) {
            $data = Streaming::whereMonth('tanggal_sidang', $request->bulan)->whereYear('tanggal_sidang', $request->tahun)->where(function ($query) use ($request) {
                $query->where('pp', $request->pp);
            })->get();
        } elseif ($request->hakim != null && $request->pp != null) {
            $data = Streaming::whereMonth('tanggal_sidang', $request->bulan)->whereYear('tanggal_sidang', $request->tahun)->where(function ($query) use ($request) {
                $query->where('hk', $request->hakim)->orWhere('ha1', $request->hakim)->orWhere('ha2', $request->hakim)->orWhere('pp', $request->pp);
            })->get();
        };

        // dd($data);
        $data_fix = [];
        $nomor = 1;
        foreach ($data as $d) {
            $data_fix[] = [
                'nomor' => $nomor++,
                'nomor_perkara' => $d->nomor_perkara . ' Jo. ' . $d->nomor_perkara_pertama,
                'majelis' => "Hakim Ketua : " . $d->hakim_ketua?->hakim_nama . "</w:t><w:br/><w:t>Hakim Anggota 1: " . $d->hakim_anggota1?->hakim_nama . "</w:t><w:br/><w:t>Hakim Anggota 2 : " . $d->hakim_anggota2?->hakim_nama,
                'pp' => $d->panitera_pengganti?->pp_nama,

            ];
        }


        Carbon::setLocale('id');
        $tanggal = Carbon::parse($request->tanggal_laporan)->isoFormat('D MMMM Y');
        $bulan_text = Carbon::parse(date('Y') . '-' . $request->bulan . '-01')->isoFormat('MMMM');
        $templateLaporan = new TemplateProcessor(public_path('template_laporan/template_laporan.docx'));

        $templateLaporan->setValue('bulan', strtoupper($bulan_text));
        $templateLaporan->setValue('tahun', $request->tahun);
        $templateLaporan->setValue('tanggal_laporan', $tanggal);
        $templateLaporan->setValue('panitera_muda_hukum', $request->panitera_muda_hukum);

        $templateLaporan->cloneRowAndSetValues('nomor', $data_fix);

        header("Content-Disposition: attachment; filename=laporan-" . time() . ".docx");
        // $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        // $this->response->setHeader('Content-Disposition', 'attachment;filename="Register-Permohonan' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateLaporan->saveAs($pathToSave);
    }
}
