@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="text-center">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary" style="float: right">Back to all Question</a>
                            <h1> {{$question->title}} </h1>
                        </div>
                    </div>
                    <hr>
                     <div class="media ">
                         <div class="d-flex flex-column vote-control">
                            <a title="This question is usfull" class="vote-up" >
                                <i class="fas fa-caret-up fa-4x"></i>
                            </a>
                            <span class="votes-count">
                                15
                            </span>
                            <a title="This question is not usfull" class="vote-down off">
                                <i class="fas fa-caret-down fa-4x"></i>

                            </a>
                            <a title="Click to mark as favorite question (click again to undo)" class="favorite">
                                <i class="fas fa-star fa-3x"></i>

                                <span class="favorite-count">
                                    33
                                </span>
                            </a>
                         </div>
                         <div class="media-body">

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
        </div>
    </div>
    @include('answers._index',
        [
            'answersCount'=>$question->answers,
            'answers'=>$question->answer_s,
        ]
    )
    @include('answers._create',
    [
        'questionId'=>$question->id
    ])

</div>
@endsection
