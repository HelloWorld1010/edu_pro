<?php

namespace App\Models\Admin;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Manager extends Model  implements \Illuminate\Contracts\Auth\Authenticatable
{
    protected $table = 'manager';

    use HasFactory;
    use HasRoles;
    use Authenticatable;

    //定义与角色模型的关联操作（一对一）
    public function role(){
        return $this->hasOne('App\Admin\Role','id','role_id');
    }
}
