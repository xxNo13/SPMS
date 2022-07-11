<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    use HasFactory;

    protected $table = 'outputs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'output',
        'funct_id',
        'user_id'
    ];

    public function funct(){
        return $this->belongsTo(Funct::class);
    }
    public function suboutputs(){
        return $this->hasMany(Suboutput::class);
    }
    public function targets(){
        return $this->hasMany(Target::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
