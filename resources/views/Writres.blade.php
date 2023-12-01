@extends("layout.master")
@section("content")
<div class="container mt-5">
    {{-- {{ $blogers }} --}}
    <div class="row">

        @foreach ($blogers as $blg)
            <div class=" col-sm-12 col-md-6"  style="display: flex; align-items:center; margin-bottom: 5rem">
                <img width="150" height="150" src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" />
                <div class=" ms-md-4" >
                    <div class=" fw-bolder">Frist Name: {{ $blg->FirstName }} </div>
                        <div>Last Name: {{ $blg->LastName }}  </div>
                        <div>Phone:  {{ $blg->Phone }} </div>
                        <div>Catigory:  {{ $blg->Category }} </div>
                    </div>
            </div>
        @endforeach
    </div>




<div>
@endsection
