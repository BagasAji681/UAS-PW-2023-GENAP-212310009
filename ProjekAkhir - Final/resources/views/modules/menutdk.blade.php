@extends('templates.layout')
@section('content')

<div class="container-fluid text-center mt-5">
    <div style="position: -webkit-sticky; position: sticky; top: 0; background-color: black; padding: 8px;">
        <h1 style="text-align: center; font-weight:bold;">Menu Hari Ini</h1>
    </div>
    <div class="container text-center mt-2 container-fluid">
        <div class="col align-items-start">
            @foreach ($products as $menu )
            @if ($menu->is_active == 1)
            <div class="row">
                <h3 style="font-weight: bold; margin-top: 5px;">{{$menu->names}}</h3>
                <div class="row">
                    <p>Rp. {{$menu->prices}}</p>
                </div>
                <div class="row">
                    <p style="font-style: italic;">{{$menu->desc}}</p>
                </div>
            </div>
            @endif
            @endforeach

        </div>
        <br>
        <br>
        <h5>Aneka Masakan Rumahan</h5>
        <h5>Aneka Minuman Dingin</h5>
        <br>
    </div>



</div>

@endsection