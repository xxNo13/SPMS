<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table = 'targets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'target',
        'output_id',
        'suboutput_id',
        'user_id'
    ];

    public function output(){
        return $this->belongsTo(Output::class);
    }
    public function suboutput(){
        return $this->belongsTo(Suboutput::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function standards(){
        return $this->hasMany(Standard::class);
    }
}
