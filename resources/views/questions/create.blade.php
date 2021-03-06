@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                   <div class="text-center">
                       <h2> Ask Questions </h2>
                       <a href="{{route('questions.index')}}" class="btn btn-outline-secondary" style="float: right">Back to all Question</a>
                   </div>
                </div>
                <div class="card-body">
                <form action="{{route('questions.store')}}" method="POST">
                    @include('questions._formQuestions',['questionButton'=>'Ask Question'])
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
