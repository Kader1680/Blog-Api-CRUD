@extends("layout.master")

@section("content")
     <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>{{ $post->created_at }}</p>

     </div>
@endsection
