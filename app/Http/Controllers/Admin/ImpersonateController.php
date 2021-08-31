<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ImpersonateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin'])->except('destroy');
    }

    public function index()
    {
        return view('admin.impersonate.index');
    }

    public function start(Request $request)
    {
        $this->validate($request, [
            'email' => [
                'required',
                'email',
                Rule::exists('users', 'email')->where(function ($builder) {
                    return $builder->where('email', '!=', request()->user()->email);
                })
            ]
        ]);

        $user = User::where('email', $request->email)->first();

        session()->put('impersonate', $user->id);

        return redirect('/')->withSuccess('You are now impersonating ' . $user->name);
    }

    public function destroy()
    {
        session()->forget('impersonate');

        return redirect('/');
    }
}
