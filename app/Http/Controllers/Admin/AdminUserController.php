<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    // Danh sách khách hàng
    public function index()
    {
        $users = User::where('role', 'user')->orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    // Form thêm khách hàng
    public function create()
    {
        return view('admin.users.create');
    }

    // Lưu khách hàng mới
   public function store(Request $request)
{
    $request->validate([
        'fullName' => 'required|string|max:100',
        'phone' => 'required|string|max:15|unique:hotel_users,phone',
        'email' => 'required|email|max:100|unique:hotel_users,email',
        'password' => 'required|string|min:6',
        'cccd_front' => 'nullable|image|max:2048',
        'cccd_back' => 'nullable|image|max:2048',
    ]);

    $data = $request->only(['fullName','phone','email']);
    $data['password'] = Hash::make($request->password);

    if ($request->hasFile('cccd_front')) {
        $data['cccd_front'] = $request->file('cccd_front')->store('cccd', 'public');
    }
    if ($request->hasFile('cccd_back')) {
        $data['cccd_back'] = $request->file('cccd_back')->store('cccd', 'public');
    }

    User::create($data);

    // 🔹 Chuyển về danh sách khách hàng
    return redirect()->route('admin.users.index')->with('success', 'Thêm khách hàng thành công!');
}


    // Form sửa khách hàng
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Cập nhật khách hàng
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'fullName' => 'required|string|max:100',
            'phone' => 'required|string|max:15|unique:hotel_users,phone,'.$id.',idUser',
            'email' => 'required|email|max:100|unique:hotel_users,email,'.$id.',idUser',
            'password' => 'nullable|string|min:6',
            'cccd_front' => 'nullable|image|max:2048',
            'cccd_back' => 'nullable|image|max:2048',
        ]);

        $user->fullName = $request->fullName;
        $user->phone = $request->phone;
        $user->email = $request->email;
        if($request->password) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('cccd_front')) {
            if($user->cccd_front) Storage::disk('public')->delete($user->cccd_front);
            $user->cccd_front = $request->file('cccd_front')->store('cccd','public');
        }
        if ($request->hasFile('cccd_back')) {
            if($user->cccd_back) Storage::disk('public')->delete($user->cccd_back);
            $user->cccd_back = $request->file('cccd_back')->store('cccd','public');
        }

        $user->save();
        return redirect()->route('users.index')->with('success','Cập nhật khách hàng thành công!');
    }

    // Xóa khách hàng
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if($user->cccd_front) Storage::disk('public')->delete($user->cccd_front);
        if($user->cccd_back) Storage::disk('public')->delete($user->cccd_back);
        $user->delete();
        return redirect()->route('users.index')->with('success','Xóa khách hàng thành công!');
    }
}
