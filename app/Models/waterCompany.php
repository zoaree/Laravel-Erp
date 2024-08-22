<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class waterCompany extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'companyName',
        'user_id'
    ];
    protected $dates = ['deleted_at'];
}
