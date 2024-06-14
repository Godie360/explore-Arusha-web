<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Enums\CompanyStatusEnum;
use App\Models\Company\CompanyModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Validation\ValidationException;


class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();
        Jetstream::deleteUsersUsing(DeleteUser::class);
        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->roles->first()->name != "superadministrator") {
                    $company_id = $user->company->id;
                    if ($company_id != null) {
                        $company = CompanyModel::select('id', 'status')->where('id', $company_id)->first();
                        if ($company->status->value == CompanyStatusEnum::Active->value) {
                            session()->put('company_id',  $company_id);
                            return $user;
                        } else {
                            session()->forget('company_id');
                            throw ValidationException::withMessages([
                                Fortify::username() => "User company is inactive.",
                            ]);
                        }
                    } else {
                        session()->forget('company_id');
                        throw ValidationException::withMessages([
                            Fortify::username() => "User does't have company.",
                        ]);
                    }
                } else {
                    session()->forget('company_id');
                    return $user;
                }
            }
        });
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
