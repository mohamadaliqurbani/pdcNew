
@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <livewire:employee-report.workshop-report :employee="$employee"/>
    </div>
@endsection
