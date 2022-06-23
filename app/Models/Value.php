<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Value extends Model
{
    use HasFactory;

    protected $table = 'values';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'category_id'
    ];

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
