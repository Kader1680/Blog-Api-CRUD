@extends("layout.master")

@section("content")
     <div class=" container">
        <h2>Edit blog select </h2>
        <form action="{{route('update', ['post' => $post])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label>Title</label>
            <input value={{ $post->title }} style="width:100%; outline:none" name="title" type="text"  /><br><br>
            <label>Body</label>
            <input value={{ $post->body }} style="width:100%; height:12rem; outline:none" name="body"></textarea><br><br>

            <input style="width:50%" name="submit" type="submit" placeholder="post" />
        </form>
     </div>
@endsection
