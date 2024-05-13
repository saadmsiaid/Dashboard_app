<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
 
    const PK ='id';
  //  protected $primary_key = 'id';
    public $table ='categories';


    protected $fillable = ['name', 'photo', 'desc'];


    public function Products()
    {
        return $this->hasMany(Product::class);
    }
   

}
