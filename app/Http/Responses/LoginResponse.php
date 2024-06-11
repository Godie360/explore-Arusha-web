<?php

namespace App\Http\Responses;

use App\Models\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {

        $roles = Auth::user()->roles;
        $user = auth()->user();
        foreach ($roles as $role) {
            $name = $role->name;
            switch ($name) {
                case 'vendor':
                    return redirect()->route('web.users.dashboard.index');
                    break;
                case 'superadministrator':
                    return redirect()->route('dashboard');
                    break;
                default:
                    auth('web')->logout();
                    break;
            }
        }
    }
}
