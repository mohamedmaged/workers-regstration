@extends('layouts.app')

@section('content')
<div class="container">
    <workerslist v-bind:workers="{{$workers}}"></workerslist>
</div>
@endsection
