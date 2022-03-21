<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static create(array $array)
 * @method static find(int $id)
 */
class Product extends Model
{
    use HasFactory;

    protected string $table = 'products';

    protected array $fillable = [
        'name',
        'description',
        'price',
    ];

    protected array $hidden = [
        'created_at',
        'updated_at'
    ];

    public function shops(): BelongsToMany
    {
        return $this->belongsToMany(Shop::class)->withPivot('quantity');
    }
}
