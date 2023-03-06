<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $with = ['permissions'];

    protected $fillable = [
        'name',
        'slug',
        'description',
        'full-access',
        'public'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id');
    }

    public function permission_menus()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id')->where('slug', 'LIKE', '%.index%')->select('slug');
    }

    /**
     * Relationship many to many
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Relationship one to one
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

}
