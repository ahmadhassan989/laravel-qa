<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @include('layouts._messages')
                <div class="card-title">
                    <h2>{{$answersCount . " " . str_plural('Answer',$answersCount)}}</h2>
                </div>
                <hr>
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

                            @can('accept', $answer)

                            <a   title="Click to select as best answer (click again to undo)" class=" {{$answer->best_answer}}"

                                    onclick="
                                        event.preventDefault();
                                        x = document.getElementById('accept-answer-{{$answer->id}}');
                                        // x.event.preventDefault();
                                        x.submit()
                                    "
                            >
                                <i class="fas fa-check fa-3x"></i>
                            </a>
                                <form id ="accept-answer-{{$answer->id}}"   action="{{ route('answers.accept',$answer->id)}}" method="POST" style="display: none">
                                    @csrf
                                </form>
                                @else
                                @if ($answer->bestAnswer)
                                     <a   title="Click to select as best answer (click again to undo)" class=" {{$answer->best_answer}}">
                                    <i class="fas fa-check fa-3x"></i>
                                     </a>
                                @endif


                                @endcan

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
                    @can('update', $answer)
                    <div class="text-center">
                        <a href=" {{route('questions.answers.edit',[$question->id,$answer->id])}} " class="btn btn-outline-secondary btn-sm">Update</a>
                            <div class="answer-delete">
                                <form action="{{route('questions.answers.destroy',[$question->id,$answer->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submitt" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure ?')" >Delete</button>
                                </form>
                            </div>

                    </div>

                    @endcan


                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>



