<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\Reserva;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
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

    public function bookings()
    {
        return $this->hasMany(Reserva::class);
    }

    // Generar el token JWT
    public static function jwt($email)
    {
        $time = time();
        $key = env('JWT_SECRET');
        $token = array(
            "iat" => $time, //Tiempo en que inicia el token
            "exp" => $time + (60 * 60 * 24), // Tiempo en que expirará el token(1 dia)
            "email" => $email
        );

        $jwt = JWT::encode($token, $key, 'HS256');

        return $jwt;
    }

    // Verificar si el token es de dicho usuario
    public static function isValidToken($token, $email)
    {
        $key = env('JWT_SECRET');
        try {
            $json = JWT::decode($token, new Key($key, 'HS256'));
            return ($json->email == $email);
        } catch (Exception $e) {
            return false;
        }
    }
}
