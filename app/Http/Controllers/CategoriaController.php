<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use Illuminate\Database\QueryException;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categorias = Categoria::orderBy('id', 'desc') -> paginate(8);
        return view('categoria.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoriaRequest $request)
    {
        //
        $categoria = Categoria::create($request -> validated());
        return redirect()->route('categoria.index')->with('success','Categoria agregada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoriaRequest $request, $id)
    {
        //
        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->validated());
        return redirect()->route('categoria.index')->with('success','Categoria actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $categoria = Categoria::findOrFail($id);
            $categoria->delete();
            return redirect()->route('categoria.index')->with('success','Categoria eliminada correctamente');
        } catch (QueryException $e) {
            // Código de violaciones de integridad de SQL:23000
            if ($e->getCode() === "23000") {
                return redirect()->back()->with('error','No se pueden eliminar categorias que tienen productos asociados');                
            }

            return redirect()->back()->with('error','Ocurrio un error inesperado con la base de datos');
        }
    }
}
