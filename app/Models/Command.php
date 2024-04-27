<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    const PK = 'id';
    public $table = "commands";


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function ligneCommands()
    {
        return $this->hasMany(LigneCommand::class);
    }
 

}
