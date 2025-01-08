<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function teknikdigital()
    {
        return $this->hasOne(Teknikdigital::class, 'nim', 'nim');
    }

    public function pengolahansinyaldigital()
    {
        return $this->hasOne(Pengolahansinyaldigital::class, 'nim', 'nim');
    }

    public function rangkaianlistrik()
    {
        return $this->hasOne(Rangkaianlistrik::class, 'nim', 'nim');
    }

    public function elektronikadaya()
    {
        return $this->hasOne(Elektronikadaya::class, 'nim', 'nim');
    }

    public function antenadanpropagasi()
    {
        return $this->hasOne(Antenadanpropagasi::class, 'nim', 'nim');
    }

    public function dasartelekomunikasi()
    {
        return $this->hasOne(Dasartelekomunikasi::class, 'nim', 'nim');
    }

    public function pengukuranlistrik()
    {
        return $this->hasOne(Pengukuranlistrik::class, 'nim', 'nim');
    }

    public function dasarelektronika()
    {
        return $this->hasOne(Dasarelektronika::class, 'nim', 'nim');
    }

    public function instrumenkendali()
    {
        return $this->hasOne(Instrumenkendali::class, 'nim', 'nim');
    }

    public function dasarsistemkendali()
    {
        return $this->hasOne(Dasarsistemkendali::class, 'nim', 'nim');
    }

    public function sistemkendalidigital()
    {
        return $this->hasOne(Sistemkendalidigital::class, 'nim', 'nim');
    }

    public function mesinlistrik()
    {
        return $this->hasOne(Mesinlistrik::class, 'nim', 'nim');
    }

    public function komputasinumerik()
    {
        return $this->hasOne(Komputasinumerik::class, 'nim', 'nim');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }
}
