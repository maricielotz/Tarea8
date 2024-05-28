<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Pais extends Model
{
    use HasFactory;
 
    protected $fillable = ['nombre'];
 
    protected $table = 'paises';
 
 
    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
 
    public function pagos()
    {
        return $this->hasManyThrough(Pago::class, Usuario::class);
    }
}