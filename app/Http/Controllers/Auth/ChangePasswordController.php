<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Rules\CurrentPasswordRule;
use App\Http\Controllers\Controller;

class ChangePasswordController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    function update(Request $request)
    {
        $this->validatePasswordLogin($request);

        $data = $request->only('password');

        $user = auth()->user();

        $user->password = bcrypt($data['password']);

        $user->save();

        return redirect('/home')->with('status', trans('passwords.changed'));
    }

    protected function validatePasswordLogin(Request $request)
    {
        $request->validate([
            'current_password' => new CurrentPasswordRule($request->get('current_password'), auth()->user()->password),
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ]);
    }
}
