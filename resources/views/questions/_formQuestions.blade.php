@csrf
<div class="form-group">
    <label for="question-title">Question Title </label>
    <input type="text" name="title" value="{{ old('title', $question->title) }}" id="question-title" class="form-control">
    @if($errors->has('title'))
        <div style="color: red">
            <strong> {{$errors->first('title')}} </strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="Question body">Explain your Question  </label>
    <textarea name="body" id="Question body" row="10" class="form-control">
        {{old('body',$question->body)}}
    </textarea>
    @if( $errors->has('body'))
    <div style="color: red">
        <strong>{{ $errors->first('body') }}</strong>
    </div>
@endif

</div>


<div class="form-group">
    <button class="btn btn-outline-primary btn-lg">
        {{$questionButton}}
    </button>

</div>
