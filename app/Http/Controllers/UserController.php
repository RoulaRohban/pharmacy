<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function update(UserUpdateRequest $request, $id)
    {
        DB::beginTransaction();

        $user = User::findOrFail($id);
        $user->update($request->validated());

        DB::commit();
        return $user;
    }
}
