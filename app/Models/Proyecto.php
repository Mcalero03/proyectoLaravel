<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyecto extends Model
{
    protected $fillable = [
        'nombre_proyecto',
        'fuente_fondos',
        'monto_planificado',
        'monto_patrocinado',
        'monto_fondos_propios'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($proyecto) {
            $proyecto->user_id = auth()->id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
