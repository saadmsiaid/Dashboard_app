<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
 
    const PK ='id';
    public $table ='clients';

    // ...

    public function produits()
    {
        return $this->hasMany(Command::class);
    }

}
