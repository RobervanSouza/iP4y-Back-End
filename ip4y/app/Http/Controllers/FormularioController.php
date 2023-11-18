<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;

class FormularioController extends Controller
{
    protected $formulario;

    public function __construct(){
        $this->formulario = new Formulario();
    }

    public function index()
    {
        
    
        return $this->formulario->all();
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
        return $this->formulario->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       return $formulario =$this->formulario->find($id);
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
        
        $formulario = Formulario::find($id);
        $input = $request->all();
        $formulario->update($input);
        return $formulario;  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formulario =$this->formulario->find($id);
        return $formulario->delete();
    }
}
