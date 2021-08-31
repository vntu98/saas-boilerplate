<?php

namespace App\Http\Controllers\Accout;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\DeactivateAccountRequest;
use Illuminate\Http\Request;

class DeactivateController extends Controller
{
    public function index()
    {
        return view('account.deactivate.index');
    }

    public function store(DeactivateAccountRequest $request)
    {
        $request->user()->delete();

        return redirect('/')->withSuccess('Your account has been deactivated');
    }
}
