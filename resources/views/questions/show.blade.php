@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="text-center">
                       <a href="{{route('questions.index')}}" class="btn btn-outline-secondary" style="float: right">Back to all Question</a>
                       <h1> {{$question->title}} </h1>
                   </div>
                </div>
                <div class="card-body">
                    <p class="lead" style="font-size: 25px"> {!! $question->body_html !!} </p>
                </div>
            </div>
        </div>
</div>
@endsection
