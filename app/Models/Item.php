<?php

namespace App\Models;

use App\Models\Category;
use App\Models\LendingRegister;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'itemName',
        'serialNo',
        'status'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function lendings(){
        return $this->hasOne(LendingRegister::class);
    }
}
