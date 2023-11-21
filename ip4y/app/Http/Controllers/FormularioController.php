<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formulario;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use LaravelLegends\PtBrValidator\Rules\Cpf;




class FormularioController extends Controller
{
    protected $formulario;

    public function __construct()
    {
        $this->formulario = new Formulario();
    }

     protected $messages = [
        'nome.required' => 'O campo nome é obrigatório.',
        'sobrenome.required' => 'O campo sobrenome é obrigatório.',
        'cpf.required' => 'O campo CPF é obrigatório.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
        'cpf.formato_cpf' => 'O campo CPF não possui o formato válido de CPF.',
        'nascimento.required' => 'O campo de data de nascimento é obrigatório.',
        'nascimento.date' => 'O campo de data de nascimento deve ser uma data válida.',
        'email.required' => 'O campo e-mail é obrigatório.',
        'email.email' => 'O campo e-mail deve ser um endereço de e-mail válido.',
    ];

    public function index()
    {
        return $this->formulario->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'sobrenome' => 'required',
            'cpf' => [
                'required',
               new Cpf(),
        Rule::unique('formulario'),
    ],
            'nascimento' => 'required|date', 
            'email' => 'required|email',
        ], $this->messages); 

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
         $existingEmail = Formulario::where('email', $request->input('email'))->first();
    if ($existingEmail) {
        return response()->json(['errors' => ['email' => 'Este e-mail já está cadastrado.']], 422);
    }

        return $this->formulario->create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->formulario->find($id);
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

    if (!$formulario) {
        return response()->json(['errors' => ['message' => 'Registro não encontrado.']], 404);
    }

 
    $existingCpf = Formulario::where('cpf', $request->input('cpf'))->where('id', '<>', $id)->first();
    if ($existingCpf) {
        return response()->json(['errors' => ['cpf' => 'Este CPF já está cadastrado.']], 422);
    }
    
     $existingEmail = Formulario::where('email', $request->input('email'))->where('id', '<>', $id)->first();
    if ($existingEmail) {
        return response()->json(['errors' => ['email' => 'Este e-mail já está cadastrado.']], 422);
    }

   
    $validator = Validator::make($request->all(), [
        'cpf' => [
            'required',
            new Cpf(),
        ],
      
    ], $this->messages);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $input = $request->all();
    $formulario->update($input);

    return $formulario;
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $formulario = $this->formulario->find($id);
        return $formulario->delete();
    }
}
