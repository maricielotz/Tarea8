<?php



namespace App\Models;



use Illuminate\Database\Eloquent\Model;



class InquilinoAlquiler extends Model

{

  protected $table = 'inquilino_alquiler';



  protected $fillable = [

    'inquilino_id',

    'alquiler_id'

  ];



  // Opcional: Si necesitas agregar funcionalidades específicas o definir relaciones adicionales, puedes hacerlo aquí

}

