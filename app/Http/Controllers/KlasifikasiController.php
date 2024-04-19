<?php

namespace App\Http\Controllers;

use App\Imports\ClassificationDataImport;
use App\Imports\ClassificationImport;
use App\Imports\ExcelDataImport;
use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class KlasifikasiController extends Controller
{
    //

    protected $classification;

    public function __construct(Classification $classification)
    {
        $this->classification = $classification;
    }

    public function proses_klasifikasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required|numeric|digits:16|regex:/^[0-9]+$/u',
            'nama'  => 'required|string|max:50|alpha',
            'jk' => 'required|in:Laki-laki,Perempuan',
            'kecamatan' => 'required|string',
            'tpt01' => 'required|in:0,1',
            'tpt02' => 'required|in:0,1',
            'tpt03' => 'required|in:0,1',
            'tpt04' => 'required|in:0,1'
        ], [
            'nik.required' => 'NIK wajib diisi.',
            'nik.numeric' => 'NIK harus berupa angka.',
            'nik.digits' => 'Panjang NIK harus 16 digit.',
            'nik.regex' => 'NIK hanya boleh berisi angka.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.alpha' => 'Nama hanya boleh berisi huruf.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $jenis_kelamin = $request->input('jk');
        $kecamatan = $request->input('kecamatan');
        $tpt01 = $request->input('tpt01');
        $tpt02 = $request->input('tpt02');
        $tpt03 = $request->input('tpt03');
        $tpt04 = $request->input('tpt04');
        $status = ($tpt01 == 1 && $tpt02 == 1 && $tpt03 == 1 && $tpt04 == 1) ? 1 : 0;

        // Simpan data ke dalam database menggunakan metode create
        Classification::create([
            'nik' => $nik,
            'nama' => $nama,
            'jenis_kelamin' => $jenis_kelamin,
            'kecamatan' => $kecamatan,
            'tpt01' => $tpt01,
            'tpt02' => $tpt02,
            'tpt03' => $tpt03,
            'tpt04' => $tpt04,
            'status' => $status
        ]);

        // Redirect ke halaman tertentu setelah penyimpanan
        return redirect()->to('/klasifikasi');
    }



    public function view_klasifikasi()
    {
        $data = $this->classification->get();

        return view('penduduk.klasifikasi ', compact('data'));
    }

    public function delete_klasifikasi($id)
    {
        $data = $this->classification->find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->to('/klasifikasi');
        // return redirect()->route('view_klasifikasi');
    }
}
