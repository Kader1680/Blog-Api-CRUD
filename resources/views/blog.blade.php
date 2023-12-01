@extends("layout.master")

@section("content")
     <div class="container allblog">
        <div class="blogs">
            <div class="head">
                <h2>{{ $post->title }}</h2>
                <div>
                    <div>
                        <form action="{{route('deleteAll', ['post' => $allPost]  )}}"  method="POST">
                            @method("delete")
                            <button  style="  background-color: #a6194b;"  type ="submit" >Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <p>{{ $post->body }}</p>
            <p class="fw-bolde text-danger">{{ $post->created_at }}</p>
        </div>

     </div>
@endsection
