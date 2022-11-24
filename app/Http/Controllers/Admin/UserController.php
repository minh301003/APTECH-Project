<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        //danh sách khách hàng
        $users = User::all();
        return view('/admin/admin_user/users', compact('users'));
    }

    public function edit(int $id)
    {
        $users = User::findOrFail($id);
        return view('/admin/admin_user/users_update', compact('users'));
    }

    public function update(Request $request, int $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->email = $request->input('email');
        $users->address = $request->input('address');
        $users->phone = $request->input('phone');
        //luu
        $users->save();
        return redirect()->action([UserController::class, 'index'])->with('message', 'Cập nhật thông tin thành công!');
    }
}
