@extends('layouts.app')

@section('content')
    <table class="uk-table">
        <caption></caption>
        <thead>
            <tr><th>Name</th></tr>
        </thead>
        <tbody>
        @foreach($instrument as $i)
            <tr><td>{{$i->name}}</td></tr>
        @endforeach
        </tbody>
    </table>
@endsection
