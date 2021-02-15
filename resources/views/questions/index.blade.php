@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                   <div class="text-center">
                       <h2> All Questions </h2>
                       <a href="{{route('questions.create')}}" class="btn btn-outline-secondary" style="float: right">Ask Question</a>
                   </div>
                </div>
                <div class="card-body">
                    @include('layouts._messages')
                    @foreach ($questions as $question)
                        <div class="media">
                            <div class="d-flex flex-column coutnters">
                                <div class="votes">
                                    <strong> {{$question->votes}} </strong> {{str_plural('vote',$question->votes)}}
                                </div>
                            <div class="status {{ $question->status }}">
                                    <strong> {{$question->answers}} </strong> {{str_plural('answer',$question->answers)}}
                                </div>
                                <div class="views">
                                    <strong> {{$question->views}} </strong> {{str_plural('view', $question->views)}}
                                </div>
                            </div>
                            <div class="media-body">

                                <div class="d-flex align-items-center">

                                    <h3> <a href=" {{ $question->url }}">{{ $question->title }}</a> </h3>
                                    <div class="ml-auto">
                                        <a href=" {{route('questions.edit',$question->id)}}" class="btn btn-outline-info">
                                            Edit
                                        </a>
                                    </div>
                                </div>
                                <p class="lead">
                                    Asked by
                                <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                                <small class="text-muted">
                                    {{$question->created_date}}
                                </small>
                                </p>
                                    {{str_limit($question->body,250) }}
                            </div>
                        </div>
                        <hr>
                    @endforeach
                        <div class="text-center">
                            <div >

                                {{ $questions->links() }}

                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
