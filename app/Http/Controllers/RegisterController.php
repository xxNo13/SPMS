<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Office;
use App\Models\AccountType;

class RegisterController extends Controller
{
    public function create()
    {
        $offices = Office::all();
        $account_types = AccountType::all();

        return view('session.register',[
            'offices' => $offices,
            'account_types' => $account_types 
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
            'office_id' => ['required'],
            'account_type_id' => ['required'],
            'agreement' => ['accepted']
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        

        session()->flash('success', 'Account has been created.');
        $user = User::create($attributes);

        return redirect('/register');
    }
}
