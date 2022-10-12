<?php

namespace App\Models;

use App\Models\LendingRegister;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'departmentName',
        'status'
    ];

    public function item(){
        return $this->hasMany(LendingRegister::class);
    }
}
