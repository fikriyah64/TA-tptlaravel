<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Input_PendudukController extends Controller
{

    public function create()
    {
        return view('penduduk.create');
    }

    public function store_penduduk(Request $request)
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

        Classification::create($data);

        return redirect()->route('penduduk.klasifikasi');
    }
    

}
