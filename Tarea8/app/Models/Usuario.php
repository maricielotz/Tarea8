<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Usuario extends Model
{
    use HasFactory;
 
    protected $fillable = ['nombre', 'email', 'pais_id'];
 
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
 
    public function perfil()
    {
        return $this->hasOne(Perfil::class);
    }
 
    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
 
    public function fotos()
    {
        return $this->morphMany(Foto::class, 'imageable');
    }
}
 