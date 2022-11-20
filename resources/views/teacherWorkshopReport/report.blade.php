@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
       <livewire:teacher-report.workshop-report :teacherinfo="$teacherinfo"/>
    </div>
@endsection