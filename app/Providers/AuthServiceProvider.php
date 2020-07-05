<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\UserPolicy;
use App\Policies\DevicePolicy;
use App\Policies\TagPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        
        Device::class => DevicePolicy::class,

        Tag::class => TagPolicy::class,

        Room::class => RoomPolicy::class,
        
        Computer::class => ComputerPolicy::class,
        
        TypeDevice::class => TypeDevicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('user', UserPolicy::class);

        Gate::resource('device', DevicePolicy::class);

        Gate::resource('tag', TagPolicy::class);

        Gate::resource('computer', ComputerPolicy::class);

        Gate::resource('room', RoomPolicy::class);

        Gate::resource('typedevice', TypeDevicePolicy::class);
    }
}
