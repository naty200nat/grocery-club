<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'stock',
        'imagem',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
