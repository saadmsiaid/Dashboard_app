<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
 
    const PK ='id';
    public $table ='categories';
    protected $fillable = ['name', 'photo', 'desc'];
    // ...

    public function produits()
    {
        return $this->hasMany(Product::class);
    }

}
