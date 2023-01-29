<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;

class DestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $this->service->destroy($user);
        return redirect()->route('admin.user.index')->with(['success' => 'Пользователь удален']);
    }
}
