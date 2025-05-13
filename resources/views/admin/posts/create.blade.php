@extends('adminlte::page')

@section('title', 'Thêm bài viết')

@section('content')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">Thêm bài viết mới</h3>
        </div>
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Slug (nếu để trống sẽ tạo tự động)</label>
                    <input type="text" name="slug" class="form-control">
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea name="content" class="form-control" rows="5" required></textarea>
                </div>

                <div class="form-group">
                    <label>Hình ảnh (tùy chọn)</label>
                    <input type="file" name="image" class="form-control-file">
                </div>

                <div class="form-group">
                    <label>Tác giả</label>
                    <select name="author_id" class="form-control">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="0">Chưa xuất bản</option>
                        <option value="1">Xuất bản</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ngày xuất bản</label>
                    <input type="datetime-local" name="published_at" class="form-control">
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">Lưu bài viết</button>
            </div>
        </form>
    </div>
@endsection
