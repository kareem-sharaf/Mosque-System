@extends('layouts.app')
@section('content')

    <div class="container">
        <h2 class="page-title">إضافة بيانات الطلاب</h2>

        @if ($students->isEmpty())
            <div class="alert alert-warning">
                لا يوجد طلاب متاحون لإضافة بيانات.
            </div>
        @else
            <form action="{{ route('action.store', ['report_id' => $report->id]) }}" method="POST">
                @csrf

                @foreach ($students as $student)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $student->name }}</h5>

                            <div class="form-group mb-2">
                                <label>الحضور</label>
                                <input type="checkbox" name="actions[{{ $student->id }}][exist]" value="1">
                            </div>

                            <div class="form-group mb-2">
                                <label>عدد الصفحات</label>
                                <input type="number" name="actions[{{ $student->id }}][pages]" class="form-control"
                                    placeholder="أدخل عدد الصفحات" value="0">
                            </div>

                            <div class="form-group mb-2">
                                <label>عدد الأحاديث</label>
                                <input type="number" name="actions[{{ $student->id }}][hadiths]" class="form-control"
                                    placeholder="أدخل عدد الأحاديث" value="0">
                            </div>

                            <div class="form-group mb-2">
                                <label>اللباس الإسلامي</label>
                                <select name="actions[{{ $student->id }}][clothes]" class="form-control">
                                    <option value="0">غير ملتزم</option>
                                    <option value="1">ملتزم</option>
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label>الإزعاج</label>
                                <select name="actions[{{ $student->id }}][noisy]" class="form-control">
                                    <option value="0">لا</option>
                                    <option value="1">نعم</option>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                                <label>نقاط اضافية</label>
                                <input type="number" name="actions[{{ $student->id }}][gift]" class="form-control"
                                    placeholder="أدخل كمية النقاط الإضافية المقدمة" value="0">
                            </div>
                        </div>
                    </div>
                @endforeach

                <button type="submit" class="btn btn-view btn-sm">إضافة البيانات</button>
            </form>
        @endif
    </div>
@endsection
