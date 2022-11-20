@extends('layouts.app')

@section('content')

    <div class="w-full px-3">
        <livewire:employee-workshop-present.employee-workshop-present :employee="$employee" />
    </div>
@endsection