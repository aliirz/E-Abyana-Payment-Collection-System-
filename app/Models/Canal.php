<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canal extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'canals';

    protected $fillable = [
        'canal_name',
        'village_id',
    ];

    public function village()
    {
        return $this->belongsTo(village::class, 'village_id');
    }
}
