<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Command extends Model
{
    use HasFactory;
    const PK = 'id';
    public $table = "commands";
    protected $fillable = ['client_id','total_amount','status'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function products() : BelongsToMany{
        return $this->belongsToMany(Command::class,"ligne_command","command_id");
     }


    // public function ligneCommands()
    // {
    //     return $this->hasMany(LigneCommand::class);
    // }
 

}
