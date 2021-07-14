<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'type_id',
            'category_id',
            'author',
            'description',
            'title'
        ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function types()
    {
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
