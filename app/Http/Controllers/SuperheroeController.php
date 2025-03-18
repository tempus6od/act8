<?php

namespace App\Http\Controllers;

use App\Superheroe;
use Illuminate\Http\Request;

class SuperheroeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = Superheroe::all();
        return view ('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superheroes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_real' => 'required',
            'nombre_heroe' => 'required',
            'foto_url' => 'required|url',
            'informacion_adicional' => 'nullable'
        ]);

        Superheroe::create($request->all());
        return redirect()->route('superheroe.index')->with('success', 'Superheroe creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function show(Superheroe $superheroe)
    {
        return view ('superheroes.show', compact('superheroe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function edit(Superheroe $superheroe)
    {
        return view('superheroes.edit', compact('superheroe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Superheroe $superheroe)
    {
        $request->validate([
            'nombre_real' => 'required',
            'nombre_heroe' => 'required',
            'foto_url' => 'required|url',
            'informacion_adicional' => 'nullable'
        ]);

        $superheroe->update($request->all());
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Superheroe  $superheroe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Superheroe $superheroe)
    {
        $superheroe->delete();
        return redirect()->route('superheroes.index')->with('success', 'Superhéroe eliminado correctamente.');
    }
}
