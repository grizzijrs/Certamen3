<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cuentas;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request\ImagenesRequest;


class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth')->except(['autenticar','logout','editar','update','destroy']);
    }

    public function autenticar(Request $request)
    {
        $user = $request->user;
        $password = $request->password;
        
        if(Auth::attempt(['user'=>$user,'password'=>$password])){
            
            return redirect()->route('home.index');
        }

        return back()->withErrors([
            'user' => 'Los Datos Ingresados son Incorrectos!',
        ])->onlyInput('user');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }
    public function editar(Cuentas $cuenta)
    {
        
        return view('admin.editarusuarios',compact('cuenta'));

    }
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Cuentas $cuenta)
    {
        $cuenta->nombre = $request->nombre;
        $cuenta->apellido = $request->apellido;
        $cuenta->save();
        return redirect()->route('administrador.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuentas $cuenta)
    {
        DB::table('imagenes')->where('cuenta_user', $cuenta->user)->delete();
        $cuenta->delete();
        return redirect()->route('administrador.index');
    }
}
