<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static create(array $array)
 * @method static find(int $id)
 */
class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'postal_code',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    function shops(): HasMany
    {
        return $this->hasMany(Shop::class);
    }
}
