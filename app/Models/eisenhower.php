<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class eisenhower extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'todo',
        'comment',
        'endDate',
        'color',
        'status',
        'user_id'
    ];
    protected $casts = [
        'endDate' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
