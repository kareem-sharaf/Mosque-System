{{-- resources/views/reports/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-semibold mb-4">Edit Report</h2>

    <form action="{{ route('reports.update', $report->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Populate form fields with existing data, similar to create form -->
        <div class="mb-4">
            <label for="student_id" class="block text-gray-700">Student ID</label>
            <input type="number" name="student_id" id="student_id" class="form-control" value="{{ $report->student_id }}" required>
        </div>

        <div class="mb-4">
            <label for="exist" class="block text-gray-700">Attendance</label>
            <select name="exist" id="exist" class="form-control" required>
                <option value="1" {{ $report->exist ? 'selected' : '' }}>Present</option>
                <option value="0" {{ !$report->exist ? 'selected' : '' }}>Absent</option>
            </select>
        </div>

        <!-- Other fields similar to the create form, with pre-filled values -->
        <!-- Pages, Hadiths, Clothes, Noisy -->

        <button type="submit" class="btn-primary">Update Report</button>
    </form>
</div>
@endsection
