<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operation;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{
    public function showForm()
    {
        if (auth()->user()->tipo !== 'pending_member') {
            return redirect()->route('dashboard')->with('message', 'Já és membro.');
        }

        return view('payment');
    }

    public function process(Request $request)
    {
        $request->validate([
            'method' => 'required|in:Visa,PayPal,MB WAY',
            'reference' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $user->update([
            'default_payment_type' => $request->method,
            'default_payment_reference' => $request->reference,
            'tipo' => 'member',
        ]);

        Operation::create([
            'user_id' => $user->id,
            'type' => 'debit',
            'reason' => 'membership_fee',
            'amount' => 10.00,
        ]);

        return redirect()->route('dashboard')->with('success', 'A tua conta foi ativada com sucesso!');
    }
}
