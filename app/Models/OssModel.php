<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OssModel extends Model
{
    use HasFactory;
    protected $table = "oss";
    protected $dates = ['created_at'];
}
