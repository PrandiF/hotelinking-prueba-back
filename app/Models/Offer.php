<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     *
     * @var array<int, string>
     */

    public $timestamps = false;


    protected $fillable = [
        'title',         
        'description',   
        'valid_until',   
        'status',
    ];

    /**
     * Los atributos que deberían tener valores predeterminados.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'status' => true,
    ];

    /**
     * Relación con los códigos promocionales.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function promoCodes()
    {
        return $this->hasMany(PromoCode::class);
    }
}
