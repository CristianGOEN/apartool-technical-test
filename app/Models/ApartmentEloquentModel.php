<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApartmentEloquentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'apartments';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $perPage = 10;

    protected $casts = [
        'active' => 'boolean'
    ];

    protected $fillable = [
        'name',
        'description',
        'quantity',
        'active',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
