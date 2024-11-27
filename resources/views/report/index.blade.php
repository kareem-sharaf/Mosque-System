@extends('layouts.app')

@section('content')
    <div class="container mb-4 white-text">
        <h1 class="page-title">جميع التقارير</h1>

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
                                class="btn btn-view btn-sm">عرض </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
