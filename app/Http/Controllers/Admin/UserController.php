<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'tipo' => 'required|in:employee,member,board,pending_member',
        ]);

        $user->tipo = $request->tipo;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuário atualizado!');
    }

    public function destroy(User $user)
    {
        $user->delete(); 
        return redirect()->route('users.index')->with('success', 'Usuário removido!');
    }
}