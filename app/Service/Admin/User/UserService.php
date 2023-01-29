<?php

namespace App\Service\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate($data);
    }

    public function update($data, $user)
    {
        $user->update($data);
        return $user;
    }

    public  function destroy($user)
    {
        $user->delete();
    }
}
