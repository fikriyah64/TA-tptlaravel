<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\kecamatan;
use App\Models\Klasifikasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard()
    {
        $jmlkecamatan = kecamatan::count();
        return view('dashboard', compact('jmlkecamatan'));
    }

    public function input_user()
    {
        $data = User::get();

        return view('index', compact('data'));
    }

    public function input_klasifikasi()
    {
        $data = Classification::get();

        return view('klasifikasi', compact('data'));
    }

    public function index()
    {
        return view('welcome');
    }

    public function create()
    {
        return view('create');
    }

    public function deteksi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
            'kecamatan' => 'required',
            'p1' => 'required',
            'p2' => 'required',
            'p3' => 'required',
            'p4' => 'required',
        ]);
        $nik = $request->nik;
        $nama = $request->nama;
        $jenkel = $request->jenkel;
        $kecamatan = $request->kecamatan;
        $p1 = $request->p1;
        $p2 = $request->p2;
        $p3 = $request->p3;
        $p4 = $request->p4;

        // mulai prediksi tpt
        if ($p1 == 1 || $p2 == 1 || $p3 == 1 || $p4 == 1) {
            $prediksi = "1";
        } else {
            $prediksi = "0";
        }
        echo $prediksi;
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

        return redirect()->route('index');
    }

    public function edit(Request $request, $id)
    {
        $data = User::find($id);

        return view('edit', compact('data'));
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

        return redirect()->route('index');
    }

    public function delete(Request $request, $id)
    {
        $data = User::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('index');
    }
}
