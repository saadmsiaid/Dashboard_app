<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommand extends Model
{
    use HasFactory;
    const PK = 'id';
    public $table = "ligne_commands";


    public function command()
    {
        return $this->belongsTo(Command::class, 'command_id');
    }

    public function produit()
    {
        return $this->belongsTo(Product::class, 'product_id');
   
}

}
