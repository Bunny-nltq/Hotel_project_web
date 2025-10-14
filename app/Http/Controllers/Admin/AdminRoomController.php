<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    // ======= Hiển thị danh sách phòng =======
    public function index()
    {
        $rooms = Room::orderBy('idRoom', 'desc')->get();
        return view('admin.rooms.index', compact('rooms'));
    }

    // ======= Form thêm phòng =======
    public function create()
    {
        return view('admin.rooms.create');
    }

    // ======= Xử lý thêm phòng =======
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required|unique:rooms',
            'room_type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric|min:0',
            'min_people' => 'required|integer|min:1',
            'max_people' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'room_number', 'room_type', 'price_per_night',
            'min_people', 'max_people', 'description', 'status'
        ]);

        // 📸 Lưu ảnh vào storage/public/rooms
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('rooms', $fileName, 'public');
            $data['image'] = $fileName; // chỉ lưu tên file
        }

        Room::create($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Thêm phòng thành công!');
    }

    // ======= Form chỉnh sửa =======
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    // ======= Cập nhật phòng =======
    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);

        $request->validate([
            'room_type' => 'required|string|max:100',
            'price_per_night' => 'required|numeric|min:0',
            'min_people' => 'required|integer|min:1',
            'max_people' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only([
            'room_type', 'price_per_night',
            'min_people', 'max_people', 'description', 'status'
        ]);

        // 📸 Nếu có ảnh mới
        if ($request->hasFile('image')) {
            if ($room->image && Storage::disk('public')->exists('rooms/' . $room->image)) {
                Storage::disk('public')->delete('rooms/' . $room->image);
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('rooms', $fileName, 'public');
            $data['image'] = $fileName;
        }

        $room->update($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Cập nhật thành công!');
    }

    // ======= Xóa phòng =======
    public function destroy($id)
    {
        $room = Room::findOrFail($id);

        if ($room->image && Storage::disk('public')->exists('rooms/' . $room->image)) {
            Storage::disk('public')->delete('rooms/' . $room->image);
        }

        $room->delete();
        return redirect()->route('admin.rooms.index')->with('success', 'Xóa phòng thành công!');
    }
}
