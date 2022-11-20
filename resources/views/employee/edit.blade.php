@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        {{-- {{ $employee }} --}}
        <livewire:employee.edit-employee :user="$user"/>
    </div>
@endsection
