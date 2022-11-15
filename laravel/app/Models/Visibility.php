<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visibility extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;
    
    const public = 1;
    const contacts = 2;
    const private  = 3;

    protected $fillable = [
        'id',
        'name',
    ];
}
