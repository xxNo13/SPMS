<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;

    protected $table = 'standards';
    protected $primaryKey = 'id';
    protected $fillable = [
        'eff_five',
        'eff_four',
        'eff_three',
        'eff_two',
        'eff_one',
        'qua_five',
        'qua_four',
        'qua_three',
        'qua_two',
        'qua_one',
        'time_five',
        'time_four',
        'time_three',
        'time_two',
        'time_one',
        'target_id',
        'user_id'
    ];

    public function target(){
        return $this->belongsTo(Target::class);
    }
}
