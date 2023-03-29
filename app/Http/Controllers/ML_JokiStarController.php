<?php

namespace App\Http\Controllers;
use App\Models\Star;
use App\Models\ML_JokiStar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ML_JokiStarController extends Controller
{
    public function getAll()
    {
        $data = ML_JokiStar::get();
        return response()->json($data);
    }

    public function getStar()
    {
        $data = Star::get();
        return response()->json($data);
    }

    public function getById($id)
    {
        $data = ML_JokiStar::where('id', '=', $id)->first();
        
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
                'id_star' => 'required',
                'qty' => 'required',
                'payment' => 'required',

            ]
        );
        if($validator->fails()){
            return Response()->json($validator->errors());
        }

        $tambah = new ML_JokiStar();
        $tambah->name = $request->name;
        $tambah->email = $request->email;
        $tambah->password = $request->password;
        $tambah->login = $request->login;
        $tambah->no_wa = $request->no_wa;
        $tambah->id_star = $request->id_star;
        $tambah->qty = $request->qty;
        $tambah->payment = $request->payment;

        //GET HARGA PAKET
        $paket = Star::where('id', '=', $tambah->id_star)->first();
        $harga = $paket->harga;

        $tambah->total = $tambah->qty * $harga;
        $tambah->save();

        $data = ML_JokiStar::where('id', '=', $tambah->id)->first();

        return response()->json(['message' => 'Berhasil tambah Joki Regular', 'data' => $data]);
    }
}
