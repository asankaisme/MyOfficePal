<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LendingRegister extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'department_id',
        'requester_name',
        'bank_id',
        'extension',
        'lent_by',
        'date_lent',
        'status'
    ];

    public function item(){
        $this->belongsTo(Item::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
