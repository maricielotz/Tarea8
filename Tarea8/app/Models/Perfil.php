<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = ['bio', 'usuario_id'];
    protected $table = 'perfiles';

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
