@extends('adminlte::page')

@section('title', 'Chỉnh sửa Bài viết')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h3 class="card-title mb-0">Chỉnh sửa Bài viết</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ old('title', $post->title) }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select class="form-control" id="status" name="status">
                        <option value="1" {{ $post->status ? 'selected' : '' }}>Xuất bản</option>
                        <option value="0" {{ !$post->status ? 'selected' : '' }}>Nháp</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="published_at" class="form-label">Ngày xuất bản</label>
                    <input type="datetime-local" class="form-control" id="published_at" name="published_at"
                        value="{{ old('published_at', $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '') }}">
                    @error('published_at')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                @if ($post->image)
                    <div class="mb-3">
                        <label class="form-label">Ảnh hiện tại</label><br>
                        <img src="{{ asset('storage/' . $post->image) }}" width="120" class="img-thumbnail">
                    </div>
                @endif

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh mới (nếu muốn thay)</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-warning">Cập nhật</button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
