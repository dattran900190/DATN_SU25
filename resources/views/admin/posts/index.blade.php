@extends('adminlte::page')

@section('title', 'Quản lý Tin tức')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">Danh sách bài viết</h3>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Thêm bài viết
            </a>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-light text-center">
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Ngày xuất bản</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $index => $post)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td class="text-center">
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh" width="80">
                            @else
                                <span class="text-muted">Không có ảnh</span>
                            @endif

                            </td>
                            <td class="text-center">
                            @if($post->status)
                                <span class="badge bg-success">Đã xuất bản</span>
                            @else
                                <span class="badge bg-secondary">Chưa xuất bản</span>
                            @endif
                        </td>

                            <td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') : 'Chưa xuất bản' }}</td>

                            <td class="text-center">
                                <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Xem
                                        </a>

                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                               <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                    style="display:inline-block"
                                    onsubmit="return confirm('Xác nhận xoá bài viết?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Xoá
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Chưa có bài viết nào.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
