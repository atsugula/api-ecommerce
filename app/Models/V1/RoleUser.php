<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';

    protected $fillable = [
        'role_id',
        'user_id'
    ];

    protected $with = ['roles', 'users'];

    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
