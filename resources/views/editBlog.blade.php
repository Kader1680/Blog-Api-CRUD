@extends("layout.master")

@section("content")
     <div class="about container">
        <h2 class=" text-center">Edit blog select </h2>
        <form action="{{route('update', ['post' => $post])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label>New Title</label>
            <input class=" p-3" style="width:100%; outline:none; border: 2.5px solid #ff993a" value={{ $post->title }} style="width:100%; outline:none" name="title" type="text"  /><br><br>
            <label>New Body</label>
            <textarea class=" p-3" style="width:100%; outline:none; border: 2.5px solid #ff993a"  value={{ $post->body }} style="width:100%; height:12rem; outline:none" name="body"></textarea><br><br>

            {{-- <input style="width:50%" name="submit" type="submit" placeholder="post" /> --}}
            <button class="btnPost" name="submit" type="submit" >Update Now</button>
        </form>
     </div>
@endsection
