@extends("layout.master")

@section("content")
     <div class="container allblog">
        <div class="blogs">
            <div class="head">
                <h2>{{ $post->title }}</h2>
                <div>
                    <div>Delete</div>
                </div>
            </div>
            <p>{{ $post->body }}</p>
            <p class="fw-bolde text-danger">{{ $post->created_at }}</p>
        </div>

     </div>
@endsection
