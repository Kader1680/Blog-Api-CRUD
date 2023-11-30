@extends("layout.master")

@section("content")
     <div class="allblog container">
        <div class="head">
            <h2>All Post</h2>
            {{-- <div style="display: flex;">
                <div>Recent</div>
                <div style="margin-left: 1rem">

                    <form  method="delete" action="" >
                            @csrf
                            @method("delete")
                        <button>Delete all</button>
                    </form>
                </div>
            </div> --}}
        </div>
        @foreach ( $posts as $post )

                <div class="blogs">
                    <a href="/blog/{{ $post->title }}"><h4> {{ $post->title }} </h4></a>
                    <p> {{ $post->body }} </p>
                    <div style="display: flex;">
                        <button style="   background-color: #197aa6; " class="text-white">
                        <a style="color: white" href="{{ route('edit', ['post' => $post]) }}">Edit</a>
                        </button>
                        <div
                        class=" text-white" style="margin-left: 2rem; color: white"  >

                            <form method="post" action="{{route('delete', ['post' => $post]  )}}">
                                @csrf
                                @method("delete")

                                <button  style="  background-color: #a6194b;"  type ="submit" >Delete</button>
                            </form>

                        </div>




                    </div>
                </div>
        @endforeach


     </div>
@endsection
