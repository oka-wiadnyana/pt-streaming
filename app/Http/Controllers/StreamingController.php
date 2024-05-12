<?php

namespace App\Http\Controllers;

use App\Models\Streaming;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\DataTables;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class StreamingController extends Controller
{
  public function index(Request $request, $jenis_perkara = null)
  {


    $now = now()->format('Y-m-d');

    if (!$jenis_perkara) {
      $datas = Streaming::where('tanggal_sidang', '>', $now)->get();
      $todayData = Streaming::where('tanggal_sidang', $now)->get();
    } else {
      $datas = Streaming::where('tanggal_sidang', '>', $now)->where('jenis_perkara', ucfirst($jenis_perkara))->get();
      $todayData = Streaming::where('tanggal_sidang', $now)->where('jenis_perkara', ucfirst($jenis_perkara))->get();
    }


    // dd($cardData);
    $returnData = $datas->map(function ($data) {
      $now = now('Asia/Makassar')->format('Y-m-d');
      $trialDate = $data->tanggal_sidang;
      if ($now < $trialDate) {
        $status = 0;
        $statusText = "Sidang belum dimulai";
      } elseif ($now == $trialDate) {
        $status = 1;
        $statusText = "Sidang berlangsung hari ini";
      } else {
        $status = 2;
        $statusText = "Sidang telah selesai";
      }

      $reverseDate = Carbon::parse($data->tanggal_sidang)->locale('id')->isoFormat('DD MMMM Y');

      $data->status = $status;
      $data->status_text = $statusText;
      $data->reverse_date = $reverseDate;

      return $data;
    });
    $returnTodayData = $todayData->map(function ($data) {

      $reverseDate = Carbon::parse($data->tanggal_sidang)->locale('id')->isoFormat('DD MMMM Y');

      $data->reverse_date = $reverseDate;

      return $data;
    });

    // dd($returnData);
    return view('user.dashboard', ['data' => $returnData, 'today' => $returnTodayData, 'jenis_perkara' => $jenis_perkara]);

    // return response($returnData,200);
  }

  public function getDataDatatables(Request $request, $jenis_perkara = null)
  {
    if ($request->ajax()) {
      if (!$jenis_perkara) {

        $data = Streaming::orderByDesc('tanggal_sidang')->get();
      } else {
        $data = Streaming::orderByDesc('tanggal_sidang')->where('jenis_perkara', ucfirst($jenis_perkara))->get();
      }

      return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('action', function ($row) {
          $actionBtn = '<a href="' . url("/detail/$row->id") . '" class="edit btn btn-info btn" >Detail</a>  ';
          if (auth()->check()) {
            $actionBtn .= '<a href="' . url("/admin/edit/$row->id") . '" class="edit btn btn-success btn" >Edit</a> <a href=""  class="delete btn btn-danger btn" onclick="deleteData(\'' . $row->id . '\');return false" >Delete</a> ';
          }
          return $actionBtn;
        })
        ->addColumn('tanggal_sidang', function ($row) {
          $tanggal_sidang = Carbon::parse($row->tanggal_sidang)->locale('id')->isoFormat("DD MMMM Y");
          return "<span style='font-size: 1rem'><strong>$tanggal_sidang</strong></span>";;
        })
        ->addColumn('jenis_perkara', function ($row) {
          if (strtolower($row->jenis_perkara) === "pidana") {
            $bg = "bg-danger";
          } elseif (strtolower($row->jenis_perkara) === "perdata") {
            $bg = "bg-success";
          } elseif (strtolower($row->jenis_perkara) === "tipikor") {
            $bg = "bg-warning";
          } elseif (strtolower($row->jenis_perkara) === "other") {
            $bg = "bg-info";
          }
          return "<span class='$bg px-3 py-2 rounded rounded-xl text-white'>$row->jenis_perkara</span>";
        })
        ->addColumn('status', function ($row) {
          $now = now('Asia/Makassar')->format('Y-m-d');
          $trialDate = $row->tanggal_sidang;
          if ($now < $trialDate) {

            $statusText = '<span class="badge badge-warning badge-pill" style="font-size: 0.8rem"> Sidang belum dimulai</span>';
          } elseif ($now == $trialDate) {
            $statusText = '<span class="badge badge-success badge-pill" style="font-size: 0.8rem">Sidang berlangsung hari ini</span>';
          } else {

            $statusText = '<span class="badge badge-primary badge-pill" style="font-size: 0.8rem">Sidang telah selesai</span>';
          }
          return $statusText;
        })

        ->addColumn('nomor_perkara', function ($row) {
          return "<span style='font-size: 1rem'><strong>$row->nomor_perkara</strong></span>";
        })
        ->addColumn('nomor_perkara_pertama', function ($row) {
          return "<span style='font-size: 1rem'><strong>$row->nomor_perkara_pertama</strong></span>";
        })
        ->rawColumns(['action', 'status', 'jenis_perkara', 'nomor_perkara', 'nomor_perkara_pertama', 'tanggal_sidang'])
        ->make(true);
    }
  }

  public function detailPerkara(Request $request, $id)
  {

    $dataDetail = Streaming::where('id', $id)->first();
    $dateReverse = Carbon::parse($dataDetail->tanggal_sidang)->locale('id')->isoFormat('DD MMMM Y');

    $dataDetail->date_reverse = $dateReverse;

    return view('user.detail', ['data' => $dataDetail]);
  }

  public function addPerkara()
  {
    return view('admin.add');
  }
  public function editPerkara(Request $request, $id)
  {
    $data = Streaming::find($id);
    return view('admin.edit', ['data' => $data]);
  }

  public function insertPerkara(Request $request)
  {
    $validated = Validator::make(
      $request->all(),
      [
        'nomor_perkara' => 'required',
        'nomor_perkara_pertama' => 'required',
        'jenis_perkara' => 'required',
        'tanggal_sidang' => 'required',
      ],

    );

    if ($validated->fails()) {
      Alert::error('Gagal', 'Isi semua field');
      return back();
    }

    Streaming::create($validated->safe()->all());
    Alert::success('Berhasil', 'Data berhasil diinput');
    return redirect('/home');
  }

  public function updatePerkara(Request $request)
  {
    $validated = Validator::make(
      $request->all(),
      [
        'nomor_perkara' => 'required',
        'nomor_perkara_pertama' => 'required',
        'jenis_perkara' => 'required',
        'tanggal_sidang' => 'required',
        'doc_putusan' => 'mimes:pdf|file|max:5000'
      ],

    );

    if ($validated->fails()) {
      Alert::error('Gagal', 'Isi semua field bertanda merah dan untuk putusan wajib berbentuk PDF max 5MB');
      return back();
    }

    if ($request->doc_putusan?->isValid()) {
      try {

        // $uploadedFileUrl = Cloudinary::uploadFile($request->file('file')->getRealPath())->getSecurePath();
        $result = $request->doc_putusan->storeOnCloudinary('alisa');
        $doc_putusan = $result->getSecurePath();
      } catch (\Exception $e) {
        Alert::error('Gagal', 'File gagal diupload');
        return back();
      }
    } else {
      $doc_putusan = $request->doc_lama;
    }

    if (str_contains($request->link_streaming, 'live')) {
      $link_streaming = str_replace('live', 'embed', $request->link_streaming);
    } elseif (str_contains($request->link_streaming, 'https://youtu.be')) {
      $link_streaming = str_replace('https://youtu.be', 'https://youtube.com/embed', $request->link_streaming);
    } else {
      $link_streaming = $request->link_streaming;
    }

    $data = [
      'nomor_perkara' => $request->nomor_perkara,
      'nomor_perkara_pertama' => $request->nomor_perkara_pertama,
      'jenis_perkara' => $request->jenis_perkara,
      'tanggal_sidang' => $request->tanggal_sidang,
      'link_streaming' => $link_streaming,
      'amar_putusan' => $request->amar_putusan,
      'doc_putusan' => $doc_putusan,
    ];
    Streaming::where('id', $request->id)->update($data);
    Alert::success('Berhasil', 'Data berhasil diupdate');
    return redirect('/home');
  }

  public function deletePerkara(Request $request, $id)
  {
    Streaming::destroy($id);
    return response()->json(['msg' => 'success']);
  }

  public function users()
  {
    $data = User::all();
    return view('admin.account', ['users' => $data]);
  }
  public function addUser()
  {
    return view('admin.add_account');
  }

  public function insertUser(Request $request)
  {
    $validated = Validator::make(
      $request->all(),
      [
        'name' => 'required',
        'username' => 'unique:users',
        'role' => 'required',
        'password' => 'required',
      ],

    );

    if ($validated->fails()) {
      Alert::error('Gagal', 'Isi semua field dan pastikan password sama');
      return back();
    }


    $data = [
      'name' => $request->name,
      'username' => $request->username,
      'role' => $request->role,
      'password' => Hash::make($request->password),
    ];

    User::create($data);
    Alert::success('Berhasil', 'Data berhasil diinput');
    return redirect('/admin/account');
  }

  public function deleteDataUser(Request $request, $id)
  {
    User::destroy($id);
    return response()->json(['msg' => 'success']);
  }


  public function getPage(Request $request, $perPage, $query = null)
  {

    $search = $query ?? "";

    $datas = Streaming::whereAny(['nomor_perkara', 'tanggal_sidang', 'jenis_perkara'], 'LIKE', "%$search%")->orderByDesc('tanggal_sidang')->count();
    $totalPage = ceil($datas / $perPage);



    return response(['total_page' => $totalPage], 200);
  }

  public function getAllRawData(Request $request)
  {


    $datas = Streaming::all();



    return response($datas, 200);
  }

  public function getDataById(Request $request, string $id)
  {


    $data = Streaming::where('id', $id)->first();

    $reverseDate = Carbon::parse($data->tanggal_sidang)->locale('id')->isoFormat('DD MMMM Y');

    $data->reverse_date = $reverseDate;



    return response($data, 200);
  }
}
