@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Appartamenti</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            @if ($apartments->contains('user_id', $userId))
                <div class="row">
                    <a class="btn btn-primary" href="{{route('admin.apartments.create')}}">Inserisci un nuovo Appartamento</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TITOLO</th>
                            <th>INDIRIZZO</th>
                            <th colspan="3">AZIONI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($apartments as $apartment)
                            @if (Auth::id() == $apartment->user_id)
                            <tr>
                                <td>{{$apartment->id}}</td>
                                <td>{{$apartment->title}}</td>
                                <td>{{$apartment->address}}</td>
                                <td><a class="btn btn-primary" href="{{route('admin.apartments.show', $apartment->id)}}">VISUALIZZA</a></td>
                                <td><a class="btn btn-primary" href="{{route('admin.apartments.edit', $apartment->id)}}">MODIFICA</a></td>
                                <td>
                                    <form action="{{route('admin.apartments.destroy', $apartment->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ELIMINA</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="row">
                    <a class="btn btn-primary" href="{{route('admin.apartments.create')}}">Inserisci il tuo primo Appartamento</a>
                </div>
            @endif
        </div>
    </div>
@endsection
