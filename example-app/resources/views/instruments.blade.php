@extends('layouts.app')

@section('content')
    <h3>Instrument's</h3>
    <table class="uk-table">
        <caption></caption>
        <thead>
            <tr><th>Name</th></tr>
        </thead>
        <tbody>
        @if(is_iterable($instrument))
            @foreach($instrument as $i)
                <tr><td>{{$i->name}}</td></tr>
            @endforeach
        @else
            <p>The instrument does not exist</p>
        @endif
        </tbody>
    </table>

    <form id="instrument-form" method="post" onsubmit="postNewInstrument(event)">
        @csrf
        <fieldset class="uk-fieldset">
            <legend class="uk-legend">Add new instrument</legend>
            <div class="uk-margin">
                <label for="name">Name</label>
                <input name="name" id="name" class="uk-input" type="text" placeholder="Type a name">
            </div>
        </fieldset>
        <input type="submit" class="uk-button uk-button-default">
    </form>
@endsection
