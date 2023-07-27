<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;
    protected $table = "levels";
    protected $fillable = [
        'level',
        'id_user',
        'id_site',
    ];
}
