@extends("layout.master")

@section("content")
     <div class="container">
        <form action="createblog" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Title</label>
            <input style="width:100%; outline:none" name="title" type="text"  /><br><br>
            <label>Body</label>
            <textarea style="width:100%; height:12rem; outline:none" name="body"></textarea><br><br>

            <input style="width:50%" name="submit" type="submit" placeholder="post" />
        </form>
     </div>
@endsection
