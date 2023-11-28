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
                    <div style="display: flex;">
                        <div style="   background-color: #197aa6; padding: 2px 15px;" class="text-white">
                        <a style="color: white" href="{{ route('edit', ['post' => $post]) }}">Edit</a>
                        </div>
                        <div style="  background-color: #a6194b;
                        padding: 2px 15px;" class=" text-white" style="margin-left: 2rem; color: white"  >

                            <form method="post" action="{{route('delete', ['post' => $post]  )}}">
                                @csrf
                                @method("delete")

                                <input type ="submit" value="delete" />
                            </form>

                        </div>




                    </div>
                </div>
        @endforeach


     </div>
@endsection
