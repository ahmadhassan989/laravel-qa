@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                   <div class="text-center">
                       <h2> Edit Questions </h2>
                       <a href="{{route('questions.index')}}" class="btn btn-outline-secondary" style="float: right">Back to all Question</a>
                   </div>
                </div>
                <div class="card-body">
                <form action="{{route('questions.store')}}" method="POST">

                    {{-- {{method_field('PUT')}} --}}

                    @include('questions._formQuestions',
                    [
                        'questionButton'=>'Update Question',
                    'title'=>$question->title,
                    'body'=>$question->body,
                    ])

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
