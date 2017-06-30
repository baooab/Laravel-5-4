<?php

namespace App;

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'confirmed', 'confirmation_code',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function findByEmail(string $email): User
    {
        return static::where('email', $email)->firstOrFail();
    }

    public function isConfirmed(): bool
    {
        return (bool) $this->confirmed;
    }

    public function isUnconfirmed(): bool
    {
        return ! $this->confirmed;
    }

    public function matchesConfirmationCode(string $code): bool
    {
        return $this->confirmation_code === $code;
    }

    public function confirm()
    {
        $this->update(['confirmed' => true, 'confirmation_code' => null]);
    }

    // send password reset email,  override the default, use markdown style 
    public function sendPasswordResetNotification($token)
    {
        Mail::to($this->email)->send(new ResetPassword($token));
    }

}
