<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AbsensiSiswaSekolah;
use App\AbsensiPraMubaligh;
use App\SiswaModel;
use DB;

class AbsensiPraMubalighController extends Controller
{
    //
    public function index()
    {
        $siswa = SiswaModel::with('kelas')->get();
        // $kelas = DB::select("select * from kelas where jenis_kelas = 'Pengajian'");
        $kelas = DB::select("select * from kelas where jenis_kelas = 'Pramubaligh'");
        // $kelas = DB::select("select * from kelas where jenis_kelas = 'Pramubaligh'");

        return view('/admin/absensi/siswaPramubaligh', ['siswa' => $siswa], ['kelas' => $kelas]);
    }


  public function getUsers($id = 0){
    // Fetch all records
    $userData['data'] = AbsensiPraMubaligh::getuserData($id);

    echo json_encode($userData);
    exit;
  }

    public function store()
    {
        $siswa = new AbsensiPraMubaligh;

        if (is_null(request('nis'))){
			\Session::flash('flash_message_fail',' Error : Tidak ada data yand dipilih.');
			return redirect()->back();
		}
		else{
        	// return request('nis');
			$counter = count(request('nis'));
			$nis = request('nis');
			// return $nis;
			date_default_timezone_set("Asia/Bangkok");
			// $tgl_absen = date("Y-m-d")." ".date("H:i:s");

			for ( $i=0; $i< $counter; $i++) {
			    $siswa = new AbsensiPraMubaligh;
				$siswa->nis = $nis[$i];
				$siswa->id_kelas = request('id_kelas');
				$siswa->pertemuan = request('pertemuan');
		        $siswa->absen = request('absen');
		        $siswa->keterangan = request('keterangan');
		        $siswa->tgl_absen = request('tgl_absen');
		        $siswa->save();
			}   

			// $guru->id_guru = request('id_guru');
	  //       $guru->absen = request('absen');
	  //       $guru->keterangan = request('keterangan');
	  //       $guru->tgl_absen = request('tgl_absen');
	  //       $guru->save();

	        \Session::flash('flash_message','successfully saved.');

	        return redirect()->back();
		}
    }

    public function show()
    {
     	$users = DB::table('absensi_pramubaligh')
		->join('siswa', 'absensi_pramubaligh.nis', '=', 'siswa.nis')
		->select('absensi_pramubaligh.*', 'siswa.nama_siswa')
		->get();
   
       return view('admin.absensi.laporanPraMubaligh',['users'=>$users]);
    }
}
