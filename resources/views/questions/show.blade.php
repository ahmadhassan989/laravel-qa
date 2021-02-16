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
                    <div class="float-right">
                        <span class="text-muted"> Created {{ $question->created_date }} </span>
                        <div class="media mt-2">
                            <img src="{{$question->user->avatar}} " alt="" style="width: 32px">
                            <div class="media-body pl-1 mt-1">
                               <a href=" {{$question->user->url}}" >
                                    {{$question->user->name}}
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{$question->answers . " " . str_plural('Answer',$question->answers)}}</h2>
                    </div>
                    <hr>
                    @foreach ($question->answer_s as $answer)
                        <div class="media">
                            <div class="media-body">
                                {!! str_limit($answer->body_html, 300) !!}
                                <div class="float-right">
                                    <span class="text-muted">
                                        Answered {{$answer->created_date }}
                                    </span>
                                    <div class="media mt-2" >
                                        <a href="{{$answer->user->url}}" class="pr-1">
                                            <img src=" {{$answer->user->avatar}} " alt="" style="width: 32px">
                                        </a>
                                        <div class="media-body mt-1">
                                            <a href=" {{$answer->user->url}} ">
                                                {{$answer->user->name}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
