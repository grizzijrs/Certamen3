<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ImagenesRequest;
use App\Models\Imagenes;
use App\Models\Cuentas;
use Illuminate\Support\Facades\Storage;
use App\File;
use Illuminate\Support\Facades\Auth;
class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth')->except(['index']);
    }
    public function index()
    {
        $imagenes = Imagenes::all();
        return view('inicio.index',compact('imagenes'));
    }
    public function baneadas(Cuentas $cuenta)
    {
        return view('artista.baneadas',compact('cuenta'));

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
    public function store(Request $request, Imagenes $imagen)
    {

        $imagen = new Imagenes();
        $file = $request->file('imagen');
    
        $fileName = $file->getClientOriginalName();
        Storage::putFileAs(
            'public', $file, $fileName
        );
    
        //Storage::setVisibility('public', $fileName);

        $imagen-> titulo = $request->titulo;
        $imagen-> archivo = $fileName;
        $imagen-> baneada = False;
        $imagen-> motivo_ban = '';
        $imagen-> cuenta_user = Auth::user()->user;
        $imagen->save();
        return redirect()->route('home.index',compact('imagen'));


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
    public function update(Request $request, Imagenes $imagen)
    {
        $imagen ->baneada = True;
        $imagen ->motivo_ban = $request->motivo_ban;
        $imagen->save();
        return redirect()->route('home.index');


    }

    public function desbanear(Request $request, Imagenes $imagen)
    {
        $imagen ->baneada = False;
        $imagen ->motivo_ban = '';
        $imagen->save();
        return redirect()->route('home.index');


    }
    public function cambiarTitulo(Request $request, Imagenes $imagen)
    {
        
        $imagen->titulo = $request->titulo;
        $imagen->save();
        return redirect()->route('home.index',compact('imagen'));


    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Imagenes $imagen)
    {
        $imagen->delete();
        return redirect()->route('artista.perfil',$imagen->cuenta_user);
    }
}
