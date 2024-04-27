<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    const PK = 'id';
    public $table = "products";


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function ligneCommands()
    {
        return $this->hasMany(LigneCommand::class);
    }
}
    
