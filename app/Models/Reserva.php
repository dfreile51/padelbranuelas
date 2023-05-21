<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'hora',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function formatHour($hour)
    {
        return substr($hour, 0, 5);
    }

    public static function getEndHour($hour)
    {
        $initHour = Reserva::formatHour($hour);

        list($hourr, $min) = explode(":", $initHour);

        if (strlen($hourr + 1) == 1) {
            return "0" . ($hourr + 1) . ":" . $min;
        }

        return ($hourr + 1) . ":" . $min;
    }
}
