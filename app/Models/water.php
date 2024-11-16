<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class water extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'company_id',
        'company_person',
        'purpose',
        'coord_x',
        'coord_y',
        'specimen',
        'type',
        'weather',
        'temp',
        'extent',
        'alinis_sekli',
        'tip',
        'ph',
        'head',
        'eh',
        'ec',
        'tds',
        'salt',
        'resistance',
        'oxygen',
        'oxygenS',
        'flow',
        'water',
        'fountain',
        'notes',
        'image_path',
        'user_id',
        'utm_zone',
    ];
    protected $casts = [
        'alinis_sekli' => 'array',
    ];
    public function company()
    {
        return $this->belongsTo(WaterCompany::class, 'company_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
