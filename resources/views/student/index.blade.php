@extends('layouts.app')
{{-- @section('content') --}}
<!-- Navigation Bar -->
@include('layouts.navigation')
<div class="container">
    <h2 class="text-center mb-4">قائمة الطلاب</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('students.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> أضف طالب جديد
        </a>

        @if (session('message'))
            <div class="alert alert-success mb-0">{{ session('message') }}</div>
        @endif
    </div>



    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>اسم الطالب</th>
                <th>الهاتف</th>
                <th>مجموع النقاط</th>
                <th class="text-center">إضافات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->total_points }}</td>
                    <td class="text-center">
                        <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm mx-1">
                            <i class="fas fa-edit"></i> تحديث
                        </a>

                        <form action="{{ route('student.delete', $student->id) }}" method="POST"
                            style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1"
                                onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطالب؟')">
                                <i class="fas fa-trash"></i> حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- @endsection --}}
