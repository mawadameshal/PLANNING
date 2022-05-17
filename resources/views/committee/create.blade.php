@extends("layout._main_layout")
@section("page_title","اللجان")
@section("contents")


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(isset($committee))
        <form method="post" action="{{ route('committee.update',$committee->id) }}" >
        @method('PATCH')
    @else
        <form action="{{ route('committee.store') }}" method="POST">
    @endif
        @csrf
        <div class="form-group">
            <label for="committee_name">إسم اللجنة</label>
            <input type="text" class="form-control" id="committee_name" placeholder="اسم اللجنة" name="committee_name" >
        </div>
        <div class="form-group">
            <label for="committee_type">نوع اللجنة</label>
            <select class="form-control" id="committee_type"  name="committee_type">
            <option value="">نوع اللجنة</option>
            <option value="1">لجنة مركزية</option>
            <option value="2">لجنة فرعية</option>
            </select>
        
        </div>
        <div class="form-group" id="committee_center_div" style="display:none;">
            <label for="committee_center_id">اللجنة المركزية</label>
            <select class="form-control" id="committee_center_id"  name="committee_center_id">
                <option value="">إختر اللجنة المركزية</option>
                @foreach($committees as $comit)
                    <option value='{{ $comit->id }}'>{{ $comit->committee_name }}</option>
                @endforeach
            </select>
        </div>
       
        <button type="submit" class="btn btn-primary">إضافة</button>
    </form>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>    <script>
        $("#committee_type").change(function() {
            if($("#committee_type").val() == 2){
                $("#committee_center_div").show();

            }else{
                $("#committee_center_div").hide();

            }
        });
    
    </script>
@endsection