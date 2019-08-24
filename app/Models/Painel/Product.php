<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    //Campos que podem ser cadastrados pelo usuario do formulario
    protected $fillable = [

        'name','number','active','category','description'
    ];
    //Campos que não podem ser cadastrados pelo usuario do formulario
    protected $guarded = ['admin'];

}