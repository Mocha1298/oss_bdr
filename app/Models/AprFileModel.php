<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AprFileModel extends Model
{
    use HasFactory;
    protected $table = 'approve_atts';
    protected $fillable = [
        'file','id_approvement'
    ];
}
