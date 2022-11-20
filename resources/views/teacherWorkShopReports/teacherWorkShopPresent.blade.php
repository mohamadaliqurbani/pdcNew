@extends('layouts.app')

@section('content')

    <div class="w-full px-3">
        <livewire:teacher-workshop-present.teacher-workshop-present :teacherinfo="$teacherinfo"/>
    </div>
@endsection
