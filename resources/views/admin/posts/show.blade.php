@extends('adminlte::page')

@section('title', 'Chi tiết bài viết')

@section('content')
    <div class="card">
        <div class="card-header bg-info text-white">
            <h3 class="card-title">Chi tiết bài viết</h3>
        </div>

        <div class="card-body">
            <p><strong>Tiêu đề:</strong> {{ $post->title }}</p>

            <p><strong>Slug:</strong> {{ $post->slug }}</p>

            <p><strong>Nội dung:</strong></p>
            <div>{!! nl2br(e($post->content)) !!}</div>

            <p><strong>Ảnh:</strong></p>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Ảnh bài viết" width="200">
            @else
                <p><em>Không có ảnh</em></p>
            @endif

            <p><strong>Trạng thái:</strong>
                @if ($post->status)
                    <span class="badge bg-success">Đã xuất bản</span>
                @else
                    <span class="badge bg-secondary">Chưa xuất bản</span>
                @endif
            </p>

            <p><strong>Ngày xuất bản:</strong>
                {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d/m/Y') : 'Chưa có' }}
            </p>

            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
@endsection
