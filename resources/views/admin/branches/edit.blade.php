@extends('adminlte::page')

@section('title', 'Chỉnh sửa Chi nhánh')

@section('content')
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h3 class="card-title mb-0">Chỉnh sửa Chi nhánh</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.branches.update', $branch->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Tên chi nhánh</label>
                    <input type="text" class="form-control" id="name" name="name" required
                        value="{{ old('name', $branch->name) }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <textarea class="form-control" id="address" name="address" required>{{ old('address', $branch->address) }}</textarea>
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" name="phone" required
                        value="{{ old('phone', $branch->phone) }}">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required
                        value="{{ old('email', $branch->email) }}">

                </div>

                <button type="submit" class="btn btn-warning">Cập nhật</button>
                <a href="{{ route('admin.branches.index') }}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
@endsection
