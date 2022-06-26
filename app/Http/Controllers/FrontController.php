<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamSubmit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    public function dashboard() {
        $exams = Exam::paginate();
        return view('front.dashboard',compact('exams'));
    }

    public function examStart(Exam $exam){
        $exam->load(['questions.options','authSubmit']);
        return view('front.exam.submit',compact('exam'));
    }

    public function examStore(Request $request,Exam $exam){

        $options = $request->get('option');


        DB::beginTransaction();
        try {

            $exam_submit = ExamSubmit::create([
                'final_mark' => 0,
                'student_id' => Auth::id(),
                'exam_id' => $exam->id,
            ]);

            $total_questions = count($options);
            $total_correct_questions = 0;

            if ($request->has('option')) {
                foreach ($options as $q_id => $option) {
                    $question = $exam->questions()->where('questions.id', $q_id)->first();
                    if ($question){
                        $option = $question->options()->where('id', $option)->first();
                        if ($option){
                            $isCorrect = $option->correct;
                            $isCorrect ? $total_correct_questions++ : null;

                            $exam_submit->answers()->attach($question->id, [
                                'option_id' => $option->id,
                                'correct' => $isCorrect,
                            ]);
                        }

                    }




                }
            }
            $final_mark = 100 * $total_correct_questions / $total_questions;
            $exam_submit->update([
                'final_mark' => $final_mark,
            ]);




            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->errorFlash($e->getMessage());
            return redirect()->back()->withInput();
        }


        return redirect()->back()->with('submit',$exam_submit);
    }
}
