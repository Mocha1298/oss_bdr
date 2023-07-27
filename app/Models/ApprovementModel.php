<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovementModel extends Model
{
    use HasFactory;
    protected $table = "approvements";
    protected $fillable = [
        'id_level',
        'id_user',
    ];
}
