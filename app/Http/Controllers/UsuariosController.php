<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return View("Usuarios.index", ["data" => Usuarios::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View("Usuarios.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Usuarios::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'assessment' => $request->assessment,
            ]
        );
        return "Creado";
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return View("Usuarios.update", ["data" => Usuarios::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $usuario = Usuarios::find($id);
        $usuario->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'assessment' => $request->assessment,
            ]
        );
        return "Actualizado";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return  "Borrado";
    }
    public function delete($id)
    {
        $usuario = Usuarios::find($id);
        $usuario->delete();
        return  "Borrado";
    }
}
