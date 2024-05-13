<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    const PK = 'id';
    public $table = "products";


    public function Category() :BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function commands() : BelongsToMany{
       return $this->belongsToMany(Command::class,"ligne_command","product_id");
    }
   
    // public function ligneCommands()
    // {
    //     return $this->hasMany(LigneCommand::class);
    // }
}
    
