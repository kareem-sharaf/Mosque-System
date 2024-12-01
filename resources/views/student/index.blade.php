@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <h2 class="text-center mb-4">قائمة الطلاب</h2>

        <!-- Header Section -->
        <div class="row mb-3 align-items-center">
            <!-- Button to Add New Student -->
            <div class="col-12 col-md-6 mb-2 mb-md-0">
                <a href="{{ route('students.create') }}" class="btn btn-primary w-10">
                    <i class="fas fa-user-plus"></i> أضف طالب جديد
                </a>
            </div>

            <!-- Success Message -->
            @if (session('message'))
                <div class="col-12 col-md-6">
                    <div class="alert alert-success text-center mb-0">{{ session('message') }}</div>
                </div>
            @endif
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
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
                            <td data-label="اسم الطالب">{{ $student->name }}</td>
                            <td data-label="الهاتف">{{ $student->phone }}</td>
                            <td data-label="مجموع النقاط">{{ $student->total_points }}</td>
                            <td data-label="إضافات">
                                <div class="d-flex flex-column flex-sm-row justify-content-center align-items-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> تحديث
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('student.delete', $student->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('هل أنت متأكد أنك تريد حذف هذا الطالب؟')">
                                            <i class="fas fa-trash"></i> حذف
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
