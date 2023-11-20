@extends("layout.master")

@section("content")
     <div class="allblog container">
        <div class="head">
            <h2>All Post</h2>
            <div style="display: flex;">
                <div>Recent</div>
                <div style="margin-left: 1rem">Delete All</div>
            </div>
        </div>
        @foreach ( $posts as $post )

                <div class="blogs">
                    <a href="/blog/{{ $post->title }}"><h4> {{ $post->title }} </h4></a>
                    <p> {{ $post->body }} </p>
                </div>
        @endforeach


     </div>
@endsection
