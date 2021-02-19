<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswersController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question,   Request $request)
    {
        $request->validate([
            'body'=>'required'
        ]);

        $question->answer_s()->create([
        'body'=>$request->body,
        'user_id'=>auth()->id()
        ]);

        return back()->with('success','Your Answer submitted successfylly');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request  ,Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers.edit',compact('answer','question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Question $question, Answer $answer)
    {
        $this->authorize('update',$answer);
        $answer->update(
            $request->validate([
                'body'=>'required'
            ])
        );
        return redirect()->route('questions.show',$question->slug)->with('success','Answer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question ,  Answer $answer)
    {
        $this->authorize('delete',$answer);
        $answer->delete();

        return back()->with('success','Answered Deleted');
    }
}
