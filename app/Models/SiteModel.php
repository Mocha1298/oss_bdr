<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteModel extends Model
{
    use HasFactory;
    protected $table = "sites";
    protected $fillable = [
        'site_name',
        'approvement_level',
    ];
}
