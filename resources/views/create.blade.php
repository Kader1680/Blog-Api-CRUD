@extends("layout.master")

@section("content")
     <div>
        <form action="createblog" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Title</label>
            <input name="title" type="text"  /><br><br>
            <label>Body</label>
            <textarea name="body"></textarea><br><br>

            <input name="submit" type="submit" />
        </form>
     </div>
@endsection
