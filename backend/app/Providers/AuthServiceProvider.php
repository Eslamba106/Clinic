<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Admin;
use App\Models\Section;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
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
     */
    public function boot(): void
    {
        $this->registerPolicies();
        $scopes   = [];
        $sections =[];
        $minutes  = 60;
        if (auth()->guard('api')->check()) {
            $sections = Cache::remember('sections', $minutes, function () {
                return Section::select('id', 'name')->get();
            });
                        

        } 

        foreach ($sections as $section) {
            Gate::define($section->name, function ($user) use ($section) {
                $guard = Auth::getDefaultDriver(); 
                if ($guard === 'sanctum' && $user instanceof User) {
                    return $user->hasPermission($section->name);
                }
            });
        }
    }
}
