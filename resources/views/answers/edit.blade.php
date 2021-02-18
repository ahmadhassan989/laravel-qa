@extends('layouts.app')


@section('content')

<div class="container">
<div class="row mt-0">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                    <div class="card-title"><h3>Create Answer</h3></div>
                    <hr>
                        <form action="{{ route('questions.answers.update',[$question->id , $answer->id]) }}" method="POST">
                            @method('put')
                            @csrf
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}} ">
                                {{ old('body', $answer->body) }}
                            </textarea>
                            @if($errors->has('body'))
                            <div class="invalid-feedback"> <strong>
                                    {{ $errors->first('body') }}
                                </strong>
                            </div>
                        @endif
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary">
                                Add answer
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
