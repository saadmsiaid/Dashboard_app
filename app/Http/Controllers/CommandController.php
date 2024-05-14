<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Command;
use App\Models\LigneCommand;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
     */public function show($commandId)
{
    $command = Command::findOrFail($commandId); 

    $command->load('products'); 

    return view('command.show', compact('command'));
  

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
    public function edit($id)
    {
        $command = Command::with('products')->findOrFail($id);
        $clients = Client::all();
        return view('command.edit', compact('command','clients'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'status' => 'required|string',
            'products' => 'required' 
        ]);
    
        DB::beginTransaction();
    
        try {
            $command = Command::findOrFail($id);
    
            $command->update([
                'client_id' => $validatedData['client_id'],
                'status' => $validatedData['status'],
            ]);
    
            foreach ($validatedData['products'] as $productData) {
                $product = Product::find($productData['id']);
    
                if ($product) {
                    $command->products()->syncWithoutDetaching([
                        $product->id => [
                            'quantity' => $productData['quantity'],
                            'price_per_unit' => $productData['price_per_unit'],
                            'total_price' => $productData['quantity'] * $productData['price_per_unit'] 
                        ]
                    ]);
                } 
            }
    
            DB::commit();
    
            return redirect()->route('commands.show', $command->id)->with('success', 'Command updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'An error occurred while updating the command.');
        }
    }
    

    function destroy($id) {
  
        DB::table('commands')->where('id', $id)->delete();
             
        return redirect()->route('commands.index');
       
      }
}
