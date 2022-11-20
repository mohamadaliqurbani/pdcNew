@extends('layouts.app')

@section('content')

    <div class="w-full px-3">
        <livewire:employee-workshop-participate.employee-workshop-participate :employee="$employee" />
    </div>
@endsection
