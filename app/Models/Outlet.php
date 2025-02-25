<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'outlets';

    protected $fillable = [
        'outlet_name',
        'canal_id',
    ];

    public function canal()
    {
        return $this->belongsTo(canal::class, 'canal_id');
    }
}
