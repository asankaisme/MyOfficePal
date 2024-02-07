@extends('layouts.app')

@section('title')
    Categories
@endsection

@section('body-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('Categories')
            </div>
        </div>
    </div>
@endsection
