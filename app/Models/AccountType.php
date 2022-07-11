<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    use HasFactory;

    protected $table = 'account_types';
    protected $primaryKey = 'id';
    protected $fillable = [
        'account_type'
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
}
