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
                    @csrf
                    <div class="form-group">
                        <label for="question-title">Question Title </label>
                        <input type="text" name="title" value="{{ old('title') }}" id="question-title" class="form-control">
                        @if($errors->has('title'))
                            <div style="color: red">
                                <strong> {{$errors->first('title')}} </strong>
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Question body">Explain your Question  </label>
                        <textarea name="body" id="Question body" row="10" class="form-control">
                            {{old('body')}}
                        </textarea>
                        @if( $errors->has('body'))
                        <div style="color: red">
                            <strong>{{ $errors->first('body') }}</strong>
                        </div>
                    @endif

                    </div>


                    <div class="form-group">
                        <button class="btn btn-outline-primary btn-lg">
                            Ask this question
                        </button>

                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
