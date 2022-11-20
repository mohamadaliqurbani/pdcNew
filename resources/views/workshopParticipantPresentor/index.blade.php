@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <livewire:workshop-participant-presentor.list-participant-or-presentor :workshop="$workshop"/>
    </div>
@endsection
