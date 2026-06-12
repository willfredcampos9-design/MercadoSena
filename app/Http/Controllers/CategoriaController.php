<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos = Categoria::all();
        // dd($datos);
        return view('categorias.index',compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.new');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [

            'nombre' => 'required|max:50' ,
            'descripcion' => 'required|max:150', 

        ]);
        
        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        else{

        Categoria::create($request->all());

        return redirect('categorias')->with('type','success')->with('message','Registro creado exitosamente');

        }
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
        $datos = Categoria::find($id);
        return view('categorias.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [

            'nombre' => 'required|max:50' ,
            'descripcion' => 'required|max:150', 

        ]);
        
        if ($validator->fails()) {

            return back()->withErrors($validator)->withInput();

        }
        else{

        $categoria->update($request->all());

        return redirect('categorias')->with('type','warning')->with('message','Registro actualizado exitosamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Categoria::destroy($id);
        return redirect('categorias')->with('type','danger')->with('message','El registro se eliminó');
    }
}
