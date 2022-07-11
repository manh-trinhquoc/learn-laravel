<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'title',
        'zip_code',
        'time_zone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullnameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function events()
    {
        return $this->belongsToMany('App\Modal\Event')->withPivot('comment')->withTimestamps();
    }

    public function state()
    {
        return $this->belongsTo('App\Modal\State');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        ResetPassword::toMailUsing(function ($notifiable, $token) {
            // var_dump($notifiable);
            // var_dump($token);
            $url = url(route('password.reset', [
                'token' => $token,
                'email' => $notifiable->getEmailForPasswordReset(),
            ], false));
            // var_dump($url);

            return (new MailMessage)
                ->subject(Lang::get('Reset Password Notification 2'))
                ->line(Lang::get('You are receiving this email because we received a password reset request for your account. 3'))
                ->action(Lang::get('Reset Password 4'), $url)
                ->line(Lang::get('This password reset link will expire in :count minutes. 5', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
                ->line(Lang::get('If you did not request a password reset, no further action is required. 6'));
        });
        parent::sendPasswordResetNotification($token);
    }
}
