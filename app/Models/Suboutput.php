<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suboutput extends Model
{
    use HasFactory;

    protected $table = 'suboutputs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'suboutput',
        'output_id',
        'user_id'
    ];

    public function output(){
        return $this->belongsTo(Output::class);
    }
    public function targets(){
        return $this->hasMany(Target::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
