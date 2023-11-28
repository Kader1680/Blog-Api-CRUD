@extends("layout.master")

@section("content")
     <div>

        @foreach ($post as $p)
            {{ $p->title }}
        @endforeach
     </div>
@endsection
