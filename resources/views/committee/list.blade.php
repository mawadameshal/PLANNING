@extends("layout._main_layout")
@section("page_title","لوحة التحكم")
@section("contents")
<div class="row">
        <div class="col-lg-11">
                <h2>عرض اللجان</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('committee.create') }}">إضافة</a>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th>الرقم</th>
            <th>إسم اللجنة</th>
            <th>نوع اللجنة</th>
            <th>اللجنة المركزية</th>
            <th width="280px">الاجراءات</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($committees as $committee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $committee->committee_name }}</td>
                <td>{{ $committee->committee_type }}</td>
                <td>{{ $committee->committee_center_id }}</td>
                <td>
                    <form action="{{ route('committee.destroy',$committee->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('committee.show',$committee->id) }}">عرض</a>
                        <a class="btn btn-primary" href="{{ route('committee.edit',$committee->id) }}">تعديل</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection