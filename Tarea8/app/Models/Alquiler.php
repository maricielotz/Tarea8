<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class Alquiler extends Model

{

  protected $table = 'alquileres';

  protected $fillable = ['monto', 'fecha_inicio', 'fecha_fin', 'departamento_id'];



  public function departamento()

  {

    return $this->belongsTo(Departamento::class);

  }



  public function inquilinos()

  {

    return $this->belongsToMany(Inquilino::class, 'inquilino_alquiler', 'alquiler_id', 'inquilino_id');

  }

}

