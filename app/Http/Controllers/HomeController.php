<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Kecamatan;
use App\Models\Klasifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //JUMLAH KECAMATAN
    public function dashboard()
    {
        $jmlkecamatan = Kecamatan::count();

        $jmlLakiLaki = Classification::where('jenis_kelamin', 'Laki-Laki')->count();
        $jmlPerempuan = Classification::where('jenis_kelamin', 'Perempuan')->count();

        $jmlpengangguran = Classification::where('jenis_kelamin', 'Laki-Laki', 'Perempuan')->count();
        return view('dashboard', compact('jmlkecamatan', 'jmlLakiLaki', 'jmlPerempuan', 'jmlpengangguran'));
    }

    //INPUT USER
    public function input_user()
    {
        $data = User::get();

        return view('user.index', compact('data'));
    }

    // public function index()
    // {
    //     return view('welcome');
    // }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama'  => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email'] = $request->email;
        $data['name'] = $request->nama;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('input_user');
    }

    // Button EDIT yang ada di Lihat Data
    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('user.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'nama'  => 'required',
            'password' => 'nullable',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email'] = $request->email;
        $data['name'] = $request->nama;

        if ($request->passwprd) {
            $data['password'] = Hash::make($request->password);
        }

        User::whereId($id)->update($data);

        return redirect()->route('input_user');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('input_user');
    }

    //BUTTON SEARCH
    public function search($filter)
    {
        $data = User::where('name', $filter)->first('');

        // if ($request->gender) {
        //   $user = $user->whereIn('gender', $request->gender);
        // }
        return $data;
        return view('user.index', compact('data'));

        // User::whereId($home)->update($data);

        // return redirect()->route('input_user');
    }


    // Button EDIT yang ada di Lihat Data
    // public function edit_penduduk(Request $request, $id)
    // {
    //     $data = Classification::find($id);

    //     return view('penduduk.edit', compact('data'));
    // }

    // public function update_penduduk(Request $request, $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'email' => 'required|email',
    //         'nama'  => 'required',
    //         'password' => 'nullable',
    //     ]);

    //     if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

    //     $data['email'] = $request->email;
    //     $data['name'] = $request->nama;

    //     if ($request->passwprd) {
    //         $data['password'] = Hash::make($request->password);
    //     }

    //     User::whereId($id)->update($data);

    //     return redirect()->route('penduduk.klasifikasi');
    // }

    // public function delete_penduduk(Request $request, $id)
    // {
    //     $data = User::find($id);

    //     if ($data) {
    //         $data->delete();
    //     }

    //     return redirect()->route('penduduk.klasifikasi');
    // }


    //PERHITUNGAN 
    // public function deteksi(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nik' => 'required',
    //         'nama' => 'required',
    //         'jenkel' => 'required',
    //         'kecamatan' => 'required',
    //         'p1' => 'required',
    //         'p2' => 'required',
    //         'p3' => 'required',
    //         'p4' => 'required',
    //     ]);
    //     $nik = $request->nik;
    //     $nama = $request->nama;
    //     $jenkel = $request->jenkel;
    //     $kecamatan = $request->kecamatan;
    //     $p1 = $request->p1;
    //     $p2 = $request->p2;
    //     $p3 = $request->p3;
    //     $p4 = $request->p4;

    //     // mulai prediksi tpt
    //     if ($p1 == 1 || $p2 == 1 || $p3 == 1 || $p4 == 1) {
    //         $prediksi = "1";
    //     } else {
    //         $prediksi = "0";
    //     }
    //     echo $prediksi;
    // }
}
