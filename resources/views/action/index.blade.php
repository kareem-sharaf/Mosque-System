@extends('layouts.app')

<!-- Navigation Bar -->
@include('layouts.navigation')

<div class="container">
    <h2 class="text-center mb-4">نشاطات الطلاب</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        @if (session('message'))
            <div class="alert alert-success mb-0">{{ session('message') }}</div>
        @endif
        <!-- زر تعبئة التقرير في الأعلى -->
        <a href="{{ route('action.create', $report->id) }}" class="btn btn-info">تعبئة التقرير</a>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>اسم الطالب</th>
                <th>الحضور</th>
                <th>عدد الصفحات</th>
                <th>عدد الأحاديث</th>
                <th>لباس اسلامي</th>
                <th>ضوضاء</th>
                <th>مجموع النقاط</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($actions as $action)
                <tr>
                    <td>{{ $action->student->name }}</td>
                    <td>{{ $action->exist ? 'نعم' : 'لا' }}</td>
                    <td>{{ $action->pages }}</td>
                    <td>{{ $action->hadiths }}</td>
                    <td>{{ $action->clothes ? 'نعم' : 'لا' }}</td>
                    <td>{{ $action->noisy ? 'نعم' : 'لا' }}</td>
                    <td>{{ $action->student->total_points }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


</div>
