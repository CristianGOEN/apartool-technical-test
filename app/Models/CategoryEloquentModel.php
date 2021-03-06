<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryEloquentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    protected $perPage = 10;

    protected $casts = [
        'active' => 'boolean'
    ];

    protected $fillable = [
        'title',
        'description',
        'active',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
