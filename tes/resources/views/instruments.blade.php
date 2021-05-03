@extends('layouts.app')

@section('content')
    <h3>Instrument's</h3>
    <table class="uk-table">
        <caption></caption>
        <thead>
        <tr>
            <th>Name</th>
            <th>Location</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @if(is_iterable($instrument))
            @foreach($instrument as $i)
                <tr>
                    <td>{{$i->instrument}}</td>
                    <td>{{$i->location}}</td>
                    <td>{{$i->status}}</td>
                </tr>
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
            <div class="uk-margin">
                <label for="location">Location</label>
                <select id="location" name="location" class="uk-input">
                    @foreach($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="uk-margin">
                <label for="status">Status</label>
                <select name="status" id="status" class="uk-input">
                    @foreach($status as $s)
                        <option value="{{$s->id}}">{{$s->name}}</option>
                    @endforeach
                </select>
            </div>
        </fieldset>
        <input type="submit" class="uk-button uk-button-default">
    </form>
@endsection
