<?php

namespace App\Http\Controllers\Admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdminFormRequest;

class AdminController extends Controller
{
    public function list() {
        $admins = Admin::all();
        return view('AdminManager.auth.admins', compact('admins'));
    }
    public function index(){
        return redirect()->route('admin.order');
    }
    public function getLogin()
    {
        return view('AdminManager.auth.login');//return ra trang login để đăng nhập
    }

    public function postLogin(Request $request)
    {

        $messages = [
            'email.required'=>'Email không được để trống',
            'email.email'=>'Địa chỉ Email không hợp lệ',
            'password.required'=>'Mật khẩu không được để trống',
        ];
        $validated = $request->validate([
        'email'=>'required|email|string',
        'password'=>'required',
        ],$messages);
        if(isset($errors)){
        $errors = $validate->errors();
            }
                if(empty($errors)){
                    $credentials = $request->only(['email', 'password']);
                if (Auth::guard('admin')->attempt($credentials)) {
                $result = 'Đăng nhập thành công';
               // return redirect()->route('home');
            } else {
                $result = 'Đăng nhập thất bại';
            }
          }
        
        return redirect()->route('admin.home');
    }
    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
}
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //thêm nhân viên
        return view('/AdminManager/auth/admin_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminFormRequest $request)
    {
        $validatedData = $request->validated();
        Admin::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'lv'       => $validatedData['lv'],
        ]);

        return redirect()->action([AdminController::class, 'list'])->with('message', 'Thêm nhân viên thành công');
    }

    public function edit(int $id)
    {
        $admins = Admin::findOrFail($id);
        return view('AdminManager.auth.admin_update', compact('admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminFormRequest $request, int $id)
    {
        $validatedData = $request->validated();
        Admin::where('id', $id)->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'lv'       => $validatedData['lv'],
        ]);

        return redirect()->action([AdminController::class, 'list'])->with('message', 'Cập nhật thông tin thành công');
        
    }

    public function destroy(int $id)
    {
        $admins = Admin::findOrFail($id);
        $admins->delete();
        return redirect()->action([AdminController::class, 'list'])->with('message', 'Xóa nhân viên thành công');
    }
}
