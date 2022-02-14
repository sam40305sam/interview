<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public const IS_ADMIN=1;
    public const IS_USER=0;

    public function get_role_type($roles_id){
        switch ($roles_id) {
            case Role::IS_ADMIN:
                return "ADMIN";
                break;
            case Role::IS_USER:
                return "USER";
                break;
        }
    }
}
