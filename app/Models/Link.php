<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    protected $fillable = [
        'material_id',
        'title',
        'description'
    ];


    public function materials()
    {
        return $this->belongsTo(Material::class);
    }
}
