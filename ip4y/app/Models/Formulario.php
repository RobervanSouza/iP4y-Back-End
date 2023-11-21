<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulario extends Model
{
    
    protected $table = 'formulario';
    protected $primaryKey = 'id';
    protected $fillable = ['nome', 'sobrenome', 'nascimento', 'email','genero', 'cpf' ];
    use HasFactory;


     public function setCpfAttribute($value)
    {
       
        $cpf = preg_replace('/[^0-9]/', '', $value);

        
        $this->attributes['cpf'] = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }
}
