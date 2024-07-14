<?php

namespace App\Http\Controllers;

use App\Models\Hakim;
use App\Models\KlasifikasiPerkara;
use App\Models\PaniteraPengganti;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;

class ReferensiController extends Controller
{
    public function klasifikasiPerkara()
    {
        return view('referensi.klasifikasi_perkara');
    }

    public function getKlasifikasiDatatables(Request $request, $jenis_perkara = null)
    {
        if ($request->ajax()) {

            $data = KlasifikasiPerkara::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url("/admin/edit_klasifikasi/$row->id") . '" class="edit btn btn-info btn" >Edit</a>  <a href=""  class="delete btn btn-danger btn" onclick="deleteKlasifikasi(\'' . $row->id . '\');return false" >Delete</a>';



                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function addKlasifikasi()
    {

        return view('referensi.add_klasifikasi');
    }

    public function insertKlasifikasi(Request $request)
    {
        $request->validate([
            'klasifikasi_text' => 'required',
            'jenis_perkara' => 'required',
        ]);
        $data = new KlasifikasiPerkara();
        $data->klasifikasi_text = $request->klasifikasi_text;
        $data->jenis_perkara = $request->jenis_perkara;
        $data->save();
        Alert::success('Berhasil', 'Data berhasil diinput');
        return redirect('/admin/klasifikasi_perkara');
    }
    public function editKlasifikasi(Request $request, $id)
    {
        $data = KlasifikasiPerkara::where('id', $id)->first();
        return view('referensi.edit_klasifikasi', ['data' => $data]);
    }

    public function updateKlasifikasi(Request $request)
    {
        $request->validate([
            'klasifikasi_text' => 'required',
            'jenis_perkara' => 'required',
        ]);
        $data = KlasifikasiPerkara::where('id', $request->id)->first();
        $data->klasifikasi_text = $request->klasifikasi_text;
        $data->jenis_perkara = $request->jenis_perkara;
        $data->save();
        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect('/admin/klasifikasi_perkara');
    }

    public function deleteKlasifikasi(Request $request, $id)
    {
        $data = KlasifikasiPerkara::where('id', $id)->first();
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return response()->json(['msg' => 'success']);
    }

    // Hakim
    public function hakim()
    {
        return view('referensi.hakim');
    }

    public function getHakimDatatables(Request $request, $jenis_perkara = null)
    {
        if ($request->ajax()) {

            $data = Hakim::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url("/admin/edit_hakim/$row->id") . '" class="edit btn btn-info btn" >Edit</a>  <a href=""  class="delete btn btn-danger btn" onclick="deleteHakim(\'' . $row->id . '\');return false" >Delete</a>';



                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function addHakim()
    {

        return view('referensi.add_hakim');
    }

    public function insertHakim(Request $request)
    {
        $request->validate([
            'hakim_nama' => 'required',

        ]);
        $data = new Hakim();
        $data->hakim_nama = $request->hakim_nama;

        $data->save();
        Alert::success('Berhasil', 'Data berhasil diinput');
        return redirect('/admin/hakim');
    }
    public function editHakim(Request $request, $id)
    {
        $data = Hakim::where('id', $id)->first();
        return view('referensi.edit_hakim', ['data' => $data]);
    }

    public function updateHakim(Request $request)
    {
        $request->validate([
            'hakim_nama' => 'required',

        ]);
        $data = Hakim::where('id', $request->id)->first();
        $data->hakim_nama = $request->hakim_nama;

        $data->save();
        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect('/admin/hakim');
    }

    public function deleteHakim(Request $request, $id)
    {
        $data = Hakim::where('id', $id)->first();
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return response()->json(['msg' => 'success']);
    }
    public function pp()
    {
        return view('referensi.pp');
    }

    public function getPpDatatables(Request $request, $jenis_perkara = null)
    {
        if ($request->ajax()) {

            $data = PaniteraPengganti::all();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = '<a href="' . url("/admin/edit_pp/$row->id") . '" class="edit btn btn-info btn" >Edit</a>  <a href=""  class="delete btn btn-danger btn" onclick="deletePp(\'' . $row->id . '\');return false" >Delete</a>';



                    return $actionBtn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function addPp()
    {

        return view('referensi.add_pp');
    }

    public function insertPp(Request $request)
    {
        $request->validate([
            'pp_nama' => 'required',

        ]);
        $data = new PaniteraPengganti();
        $data->pp_nama = $request->pp_nama;

        $data->save();
        Alert::success('Berhasil', 'Data berhasil diinput');
        return redirect('/admin/pp');
    }
    public function editPp(Request $request, $id)
    {
        $data = PaniteraPengganti::where('id', $id)->first();
        return view('referensi.edit_pp', ['data' => $data]);
    }

    public function updatePp(Request $request)
    {
        $request->validate([
            'pp_nama' => 'required',

        ]);
        $data = PaniteraPengganti::where('id', $request->id)->first();
        $data->pp_nama = $request->pp_nama;

        $data->save();
        Alert::success('Berhasil', 'Data berhasil diupdate');
        return redirect('/admin/pp');
    }

    public function deletePp(Request $request, $id)
    {
        $data = PaniteraPengganti::where('id', $id)->first();
        $data->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return response()->json(['msg' => 'success']);
    }
}
