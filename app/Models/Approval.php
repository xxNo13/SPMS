<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'approvals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'headoffice_id',
        'headoffice_status',
        'hdu_id',
        'hdu_status',
        'type'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
