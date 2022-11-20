@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <livewire:awearness.awearness-list :workshop="$workshop"/>
    </div>
@endsection
