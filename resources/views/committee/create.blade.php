@extends("layout._main_layout")
@section("page_title","اللجان")
@section("contents")
    <div class="row">
        <div class="col-lg-11">
            <h2>إضافة لجنة جديدة</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('committee') }}"> رجوع</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('committee.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="txtFirstName">إسم اللجنة</label>
            <input type="text" class="form-control" id="txtFirstName" placeholder="Enter First Name" name="txtFirstName">
        </div>
        <div class="form-group">
            <label for="txtLastName">نوع اللجنة</label>
            <input type="text" class="form-control" id="txtLastName" placeholder="Enter Last Name" name="txtLastName">
        </div>
       
        <button type="submit" class="btn btn-default">إضافة</button>
    </form>
@endsection