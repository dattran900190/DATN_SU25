<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('published_at', 'desc')->get(); // Hiển thị bài mới nhất trước
        return view('admin.posts.index', compact('posts'));
    }
    public function show(Post $post)
{
    return view('admin.posts.show', compact('post'));
}

   public function create()
{
    $authors = User::all(); // hoặc Author::all() nếu bạn dùng model riêng
    return view('admin.posts.create', compact('authors'));
}

   public function store(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
        'status' => 'required|boolean',
        'published_at' => 'nullable|date',
    ]);

    // Tạo slug từ title nếu chưa có slug
    $data['slug'] = $data['slug'] ?? Str::slug($data['title']);

    // Xử lý hình ảnh nếu có
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('uploads/posts', 'public');
    }

    // Thêm author_id và published_at
    $data['author_id'] = Auth::id();  // Lấy id của người dùng đang đăng nhập
    $data['published_at'] = $data['published_at'] ?? now(); // Nếu không có published_at thì mặc định là thời gian hiện tại

    // Tạo bài viết mới
    Post::create($data);

    // Điều hướng về trang danh sách bài viết và thông báo thành công
    return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết thành công!');
}
public function edit(Post $post)
{
    return view('admin.posts.edit', compact('post'));
}

public function update(Request $request, Post $post)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
        'status' => 'required|boolean',
        'published_at' => 'nullable|date',
    ]);

    $data['slug'] = Str::slug($data['title']);
    $data['published_at'] = $data['published_at'] ?? now();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('uploads/posts', 'public');
    }

    $post->update($data);

    return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công!');
}

public function destroy(Post $post)
{
    // Xóa hình ảnh nếu có
    if ($post->image && \Storage::disk('public')->exists($post->image)) {
        \Storage::disk('public')->delete($post->image);
    }

    // Xóa bài viết
    $post->delete();

    return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công!');
}

}
