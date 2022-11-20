@extends('layouts.app')

@section('content')

    <div class="w-full px-3">
        <livewire:teacher-workshop-participant.teacher-workshop-participant :teacherinfo="$teacherinfo" />
    </div>
@endsection
