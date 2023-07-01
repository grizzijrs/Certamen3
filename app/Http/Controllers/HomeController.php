<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagenes;
use App\Models\Cuentas;
use Illuminate\Http\Request\ImagenesRequest;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function search(Request $request)
    {
        $search = $request->search;

        $imagenes = Imagenes::where(function($query) use ($search){

            $query->where('cuenta_user', 'like', "%$search%");
        })
        ->orWhereHas('cuenta', function($query) use ($search){
            $query->where('user', 'like', "%$search%");
        })
        ->get();

        return view('inicio.index', compact('imagenes', 'search'));
    }
    
    public function index()
    {
        $imagenes = Imagenes::all();
        return view('inicio.index',compact('imagenes'));
    }
    public function login()
    {
        return view('home.login');

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
