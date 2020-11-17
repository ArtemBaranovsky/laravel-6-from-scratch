<?php

namespace App\Providers;

use App\Conversation;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

//        Gate::define('update-conversation', function (?User $user, Conversation $conversation) {  // ?User makes User optional
/*        Gate::define('update-conversation', function (?User $user, Conversation $conversation) {  // moved to own dedicated policy class
//            return true;
            return $conversation->user->is($user);
        });*/

//        Gate::before(function ($user, $ability) {
//            return $user->abilities()->contains($ability);  // we shouldn't return if the user has no the given ability!!!
//        });

        Gate::before(function ($user, $ability) {
            if ($user->abilities()->contains($ability)) {
                return true;    // We should only return from that method if the user has the given ability!!!
            }
        });

/*        Gate::before(function (User $user) {
            if ($user->id == 3) { // admin
                return true;
            }
        });*/
    }
}
