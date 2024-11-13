@extends('layouts.app')
@include('layouts.navigation')

<div class="container">
    <h2 class="text-center mb-4">إضافة بيانات الطلاب</h2>

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
                            <option value="1">غير ملتزم</option>
                            <option value="0">ملتزم</option>
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label>الإزعاج</label>
                        <select name="actions[{{ $student->id }}][noisy]" class="form-control">
                            <option value="1">لا</option>
                            <option value="0">نعم</option>
                        </select>
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">إضافة البيانات</button>
    </form>
</div>
