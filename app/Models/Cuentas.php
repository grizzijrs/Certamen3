<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cuentas extends Authenticatable
{
    use HasFactory;
    protected $table = 'cuentas';
    protected $primaryKey = 'user';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    public function cuenta():BelongsTo{
        return $this->belongsTo(Perfiles::class);
    }

    
    public function imagenes(): HasMany
    {
        return $this->hasMany(Imagenes::class, 'cuenta_user', 'user');
    }
    public function registraUltimoLogin():void
    {
        $this->ultimo_login = Carbon::now();
        $this->save();
    }

    public function cambiarEstado():void
    {
        $this->activo = !$this->activo;
        $this->save();
    }
}

