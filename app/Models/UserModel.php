<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'updated_at', 'deleted_at',
        'fullname', 'gender', 'address', 'phone', 'image_user',
    ];

    public function getUserWithRole()
    {
        return $this->join('auth_groups_users', 'auth_groups_users.user_id=users.id', 'left')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left')
            ->where('users.id', user_id());
    }

    public function getUserAdmin()
    {
        return $this->select('users.*, users.id as id_user')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id', 'left')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left')
            ->where('auth_groups.name', 'admin');
    }

    public function deleteUser($username)
    {
        $id = $this->where('username', $username)->first()->id;
        return $this->delete($id);
    }

    public function getOneUserbyUsername($username)
    {
        return $this->where('username', $username)->first();
    }

    public function getOneUserPetugas($username)
    {
        return $this->select('users.*, users.id as id_user, auth_groups.*')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id', 'left')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left')
            ->where('username', $username)->first();
    }

    public function getLimitUser()
    {
        return $this->orderBy('created_at', 'DESC')
            ->limit(4);
    }
}
