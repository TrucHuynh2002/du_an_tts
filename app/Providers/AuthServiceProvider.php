<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use App\Models\phancongcongviec;
use App\Models\User;
use App\Models\nhom;


// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('get-quantrivien', function ($user) {
            return $user->id_chucvu == 5;
        });
        Gate::define('get-quanli', function ($user) {
            return $user->id_chucvu == 6;
        });
        Gate::define('get-thuctapsinh', function ($user) {
            return $user->id_chucvu == 7;
        });
        Gate::define('get-nhomtruong', function ($user) {
            $get_leader = nhom::where('id_nhomtruong','=',$user->id_sv)->first();
            if($get_leader){

                return $user->id_sv == $get_leader->id_nhomtruong;
            }
        });
        //
    }
}
