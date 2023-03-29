<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ML_JokiPaket;
use App\Models\Paket;
class ML_JokiPaketController extends Controller
{
    public function getAll()
    {
        $data = ML_JokiPaket::get();
        return response()->json($data);
    }

    public function getPaket()
    {
        $data = Paket::get();
        return response()->json($data);
    }

    public function getById($id)
    {
        $data = ML_JokiPaket::where('id', '=', $id)->first();
        
        return response()->json($data);
    }

    public function tambah (Request $request){
        $validator=Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'login' => 'required',
                'id_paket' => 'required',
                'no_wa' => 'required',
                'total' => 'required',
                'payment' => 'required',

            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $tambah = new ML_JokiPaket();
        $tambah->name = $request->name;
        $tambah->email = $request->email;
        $tambah->password = $request->password;
        $tambah->login = $request->login;
        $tambah->id_paket = $request->id_paket;
        $tambah->no_wa = $request->no_wa;
        $tambah->payment = $request->payment;
        //GET HARGA PAKET
        $paket = Paket::where('id', '=', $tambah->id_paket)->first();
        $harga = $paket->harga;

        $tambah->total = $harga;
        $tambah->save();

        $data = ML_JokiPaket::where('id', '=', $tambah->id)->first();

        return response()->json(['message' => 'Berhasil tambah Joki Paket', 'data' => $data]);

    }
}
