<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{$answersCount . " " . str_plural('Answer',$answersCount)}}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-control">
                            <a title="This answer is usfull" class="vote-up" >
                                <i class="fas fa-caret-up fa-4x"></i>
                            </a>
                            <span class="votes-count">
                                15
                            </span>
                            <a title="This answer is not usfull" class="vote-down off">
                                <i class="fas fa-caret-down fa-4x"></i>
                            </a>
                            <a title="Click to select as best answer (click again to undo)" class="vote-accepted">
                                <i class="fas fa-check fa-3x"></i>
                            </a>
                         </div>
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
