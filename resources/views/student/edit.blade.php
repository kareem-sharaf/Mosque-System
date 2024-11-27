@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('تعديل طالب') }}</div>

                    <div class="card-body">
                        <form action="{{ route('student.update', $student->id) }}" method="post">

                            @csrf
                            @method('post') <!-- Indicates this is a PUT request -->


                            <div class="form-group">
                                <label for="name">الاسم الثلاثي</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $student->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="phone">رقم مبايل أو هاتف</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ $student->phone }}" >
                            </div>

                            <div class="form-group">
                                <label for="total_points">مجموع النقاط</label>
                                <input type="number" name="total_points" id="total_points" class="form-control"
                                    value="{{ $student->total_points }}" required>
                            </div>

                            <!-- edit Student button -->
                            <button type="submit" class="btn btn-primary">
                                تعديل
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
