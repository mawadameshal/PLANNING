@extends("layout._main_layout")
@section("page_title","لوحة التحكم")
@section("contents")
<div class="row">
        <div class="col-lg-11">
                <h2>تفاصيل اللجنة</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('committee') }}"> رجوع</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
			<th>إسم اللجنة</th>
            <td>{{ $committee->committee_name }}</td>
        </tr>
        <tr>
			<th>نوع اللجنة</th>
            <td>{{ $committee->committee_type }}</td>
        </tr>
        <tr>
			<th>اللجنة المركزية</th>
            <td>{{ $committee->committee_center_id }}</td>
        </tr>
 
    </table>
    <div>
@endsection