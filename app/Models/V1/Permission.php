<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'controller'
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'permission_roles', 'permission_id', 'role_id');
    }

}
