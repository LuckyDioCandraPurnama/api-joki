<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ML_JokiClas;
use App\Models\Clas;

class ML_JokiClasController extends Controller
{
    public function getAll()
    {
        $data = ML_JokiClas::get();
        return response()->json($data);
    }

    public function getById($id)
    {
        $data = ML_JokiClas::where('id', '=', $id)->first();
        
        return response()->json($data);
    }
    public function tambah (Request $request){
        $validator=Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'login' => 'required',
                'no_wa' => 'required',
                'id_clas' => 'required',
                'qty' => 'required',
                'payment' => 'required',
            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $tambah = new ML_JokiClas();
        $tambah->name = $request->name;
        $tambah->email = $request->email;
        $tambah->password = $request->password;
        $tambah->login = $request->login;
        $tambah->no_wa = $request->no_wa;
        $tambah->id_clas = $request->id_clas;
        $tambah->qty = $request->qty;
        $tambah->payment = $request->payment;

        //GET HARGA PAKET
        $paket = Clas::where('id', '=', $tambah->id_clas)->first();
        $harga = $paket->harga;

        $tambah->total = $tambah->qty * $harga;
        $tambah->save();

        $data = ML_JokiClas::where('id', '=', $tambah->id)->first();

        return response()->json(['message' => 'Berhasil tambah Joki Classic', 'data' => $data]);
    }
}
