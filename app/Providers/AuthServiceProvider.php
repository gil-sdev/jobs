<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

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
/// Personallizacion de mensajes de correo 
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage) 
            ->subject('Verificar cuenta')
            ->line('Tu cuenta esta casi lista, haz click para confirmar la cuenta')
            ->action('COnfirmar cuenta',$url)
            ->line('Si crees que este correo es un error, ignore el mensaje');
        });

        //
    }
}
