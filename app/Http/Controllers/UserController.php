<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
            // 'name' => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            // 'email' => ['required', 'email', Rule::unique('users', 'email')],
            // 'password' => ['required', 'min:8', 'max:20'],
        ]);
        //return 'Hello from our controller';


         $incomingFields['password'] = bcrypt($incomingFields['password']);
         User::create($incomingFields);
         //$user = User::create($incomingFields);
        // Auth::login($user);

        //  return redirect('/');
    }
}
