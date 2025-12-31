<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DbTable extends Model
{
    use HasFactory;

    protected $table = 'database'; // bcz model changes DbTable to db_table so write table everytime
    protected $fillable = [
        'name',
        'email',
        'age',
        'position',
        'company'
    ];
}
