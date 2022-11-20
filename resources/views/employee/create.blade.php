@extends('layouts.app')

@section('content')
    <div class="w-full px-3">
        <livewire:employee.create-employee :user="$user">
    </div>
@endsection
