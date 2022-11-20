@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <livewire:out-side-presentor.edit :outsidepresentor="$outsidepresentor"/>
    </div>
@endsection
