@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('إضافة طالب') }}</div>

                    <div class="card-body">
                        <form action="{{ route('students.store') }}" method="post">
                            @csrf

                            <!-- حقل الاسم -->
                            <div class="form-group">
                                <label for="name">الاسم الثلاثي</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <!-- حقل الهاتف -->
                            <div class="form-group">
                                <label for="phone">رقم مبايل أو هاتف</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="09--------">
                                @if ($errors->has('phone'))
                                    <div class="text-danger">{{ $errors->first('phone') }}</div>
                                @endif
                            </div>

                            <!-- حقل النقاط الافتراضية -->
                            <div class="form-group">
                                <label for="total_points">مجموع النقاط</label>
                                <input type="number" name="total_points" id="total_points" class="form-control" value="0" min="0">
                            </div>

                            <!-- زر الإضافة -->
                            <button type="submit" class="btn btn-primary">
                                إضافة
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
