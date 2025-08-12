<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'ambiente_id',
        'codigo',
        'tipo',
        'descricao',
        'status',
    ];
    protected function registros(){
        return $this->hasMany(Registro::class);
    }
    protected function ambiente(){
        return $this->belongsTo(ambiente::class);
    }
}
