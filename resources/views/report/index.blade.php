@extends('layouts.app')

{{-- @section('content') --}}
@include('layouts.navigation')

<div class="container">
    <h1>جميع السجلات</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>

                <th>تقرير اليوم</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->id }}</td>
                    <td>{{ $report->date }}</td>
                    <td>
                        <a href="{{ route('actions.index', ['report_id' => $report->id]) }}"
                            class="btn btn-info btn-sm">عرض </a>



                        {{-- <a href="{{ route('report.edit', $report->id) }}" class="btn btn-warning btn-sm">تعديل</a> --}}
                        {{-- <form action="{{ route('report.delete', $report->id) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{-- @endsection --}}
