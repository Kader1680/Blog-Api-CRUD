@extends("layout.master")

@section("content")
     <div class="container about p-5">
        <h2 class=" text-center">Start Your Own Blog Post</h2>
        <form action="createblog" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Title</label>
            <input class=" p-3" style="width:100%; outline:none; border: 2.5px solid #ff993a" name="title" type="text"  /><br><br>
            <label>Body</label>
            <textarea class=" p-4" style="width:100%; height:12rem; outline:none; border: 2.5px solid #ff993a" name="body"></textarea><br><br>

            {{-- <input style="width:50%" name="submit" type="submit"  /> --}}
            <button class="btnPost" name="submit" type="submit" >Post Now</button>
        </form>
     </div>
@endsection
