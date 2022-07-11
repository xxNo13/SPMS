<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $table = 'trackings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'subject',
        'user_id',
        'output',
        'date_accomplished',
        'remarks',
        'set_user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
