<?php

namespace App\Http\Controllers;

use App\Models\Command;
use App\Models\LigneCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commands = Command::with('client')->get();
        
        return view('command.index', compact('commands'));
    }

    /**
     * Show the form for creating a new resource.
     */public function show($id)
{
    $ligneCommandes = LigneCommand::with('products', 'command.client')
    ->where('command_id', $id)
    ->toSql(); // Get the SQL query
   // dd($ligneCommandes);

    return view('command.show', ['ligneCommandes' => $ligneCommandes]);
}
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function edit(Command $command)
    {
        // Retrieve the command and pass it to the edit view
        return view('commands.edit', compact('command'));
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id) {
  
        DB::table('commands')->where('id', $id)->delete();
             
        return redirect()->route('commands.index');
       
      }
}
