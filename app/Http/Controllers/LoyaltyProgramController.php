<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoyaltyProgram;

class LoyaltyProgramController extends Controller
{
  

    public function update(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'points' => 'required|integer',
        ]);

        $loyaltyProgram = LoyaltyProgram::first();
        if (!$loyaltyProgram) {
            $loyaltyProgram = new LoyaltyProgram();
        }
        
        $loyaltyProgram->amount = $request->amount;
        $loyaltyProgram->points = $request->points;
        $loyaltyProgram->save();

        return redirect()->back()->with('success', 'Loyalty Program updated successfully!');
    }
}
