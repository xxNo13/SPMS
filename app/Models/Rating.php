<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'accomplishment',
        'efficiency',
        'quality',
        'timeliness',
        'average',
        'user_id',
        'target_id'
    ];

    public function target(){
        return $this->belongsTo(Target::class);
    }
}
