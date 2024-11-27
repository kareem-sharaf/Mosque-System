@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 class="page-title">تعديل نشاطات الطلاب</h2>

        <form action="{{ route('action.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')

            @foreach ($actions as $action)
                @php
                    $student = $students->where('id', $action->student_id)->first();
                @endphp

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $student->name }}</h5>

                        <div class="form-group mb-2">
                            <label>الحضور</label>
                            <input type="checkbox" name="actions[{{ $action->id }}][exist]" value="1"
                                {{ $action->exist ? 'checked' : '' }}>
                        </div>

                        <div class="form-group mb-2">
                            <label>عدد الصفحات</label>
                            <input type="number" name="actions[{{ $action->id }}][pages]" class="form-control"
                                placeholder="أدخل عدد الصفحات" value="{{ $action->pages }}">
                        </div>

                        <div class="form-group mb-2">
                            <label>عدد الأحاديث</label>
                            <input type="number" name="actions[{{ $action->id }}][hadiths]" class="form-control"
                                placeholder="أدخل عدد الأحاديث" value="{{ $action->hadiths }}">
                        </div>

                        <div class="form-group mb-2">
                            <label>اللباس الإسلامي</label>
                            <select name="actions[{{ $action->id }}][clothes]" class="form-control">
                                <option value="0" {{ $action->clothes == 0 ? 'selected' : '' }}>غير ملتزم</option>
                                <option value="1" {{ $action->clothes == 1 ? 'selected' : '' }}>ملتزم</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>الإزعاج</label>
                            <select name="actions[{{ $action->id }}][noisy]" class="form-control">
                                <option value="0" {{ $action->noisy == 0 ? 'selected' : '' }}>لا</option>
                                <option value="1" {{ $action->noisy == 1 ? 'selected' : '' }}>نعم</option>
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label>نقاط اضافية</label>
                            <input type="number" name="actions[{{ $action->id }}][gift]" class="form-control"
                                placeholder="أدخل كمية النقاط الإضافية المقدمة" value="{{ $action->gift }}">
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-view btn-sm">تحديث البيانات</button>
        </form>
    </div>
@endsection
