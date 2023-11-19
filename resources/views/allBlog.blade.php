@extends("layout.master")

@section("content")
     <div>
        @foreach ( $posts as $post )
                <a href="/blog/{{ $post->title }}"><h4> {{ $post->title }} </h4></a>
                <p> {{ $post->body }} </p>
        @endforeach


     </div>
@endsection
