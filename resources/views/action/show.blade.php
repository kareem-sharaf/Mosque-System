{{-- resources/views/reports/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4">Report Details</h2>

    <ul>
        <li><strong>Student ID:</strong> {{ $report->student_id }}</li>
        <li><strong>Attendance:</strong> {{ $report->exist ? 'Present' : 'Absent' }}</li>
        <li><strong>Pages:</strong> {{ $report->pages }}</li>
        <li><strong>Hadiths:</strong> {{ $report->hadiths }}</li>
        <li><strong>Clothes:</strong> {{ $report->clothes ? 'Yes' : 'No' }}</li>
        <li><strong>Noisy:</strong> {{ $report->noisy ? 'Yes' : 'No' }}</li>
    </ul>

    <a href="{{ route('reports.index') }}" class="btn-primary mt-4">Back to List</a>
</div>
@endsection
