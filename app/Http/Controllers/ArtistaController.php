<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuentas;
use App\Models\Perfiles;
use App\Models\Imagenes;
use App\Http\Requests\CuentaRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ImagenesRequest;


class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth')->except(['index','store']);;
    }
    public function index()
    {
        return view('artista.register');
    }

    public function perfil(Cuentas $cuenta)
    {  
        return view('artista.imagenes',compact('cuenta'));
    }
    public function perfiles(Cuentas $cuenta)
    {
        return view('artista.imagenes',compact('cuenta'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CuentaRequest $request)
    {

        $cuenta = new Cuentas();
        $cuenta -> nombre = $request-> nombre;
        $cuenta -> apellido = $request-> apellido;
        $cuenta -> user = $request-> user;
        $cuenta -> password = Hash::make($request-> password);
        $cuenta->perfil_id = 2;
        $cuenta ->save();
        return redirect()->route('home.index'); 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
