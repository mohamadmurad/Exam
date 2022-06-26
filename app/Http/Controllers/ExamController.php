<?php

namespace App\Http\Controllers;

use App\Models\Behavior;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Subject;
use Egulias\EmailValidator\Exception\ExpectingAT;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $exams = Exam::withCount('questions')->get();
        return view('backend.exams.index', compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        return view('backend.exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            'name' => 'required|string',
            'options' => 'required|array',
            'options.*' => 'required|array',
            'options.*.*' => 'required|string',
            'option_correct' => 'required|array',
            'questions' => 'required|array',
            'questions.*' => 'required|string',
        ]);


        $questions = $request->get('questions');
        $options = $request->get('options');
        $option_correct = $request->get('option_correct');


        DB::beginTransaction();
        try {

            $exam = Exam::create([
                'name' => $request->get('name')
            ]);


            foreach ($questions as $index => $question) {

                $newQuestion = $exam->questions()->create([
                    'question' => $question,
                ]);

                if (isset($options[$index]) && isset($option_correct[$index])) {
                    foreach ($options[$index] as $num => $option) {
                        $newOption = $newQuestion->options()->create([
                            'option' => $option,
                            'correct' => $num == $option_correct[$index]
                        ]);
                    }
                }
            }


            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $this->errorFlash($e->getMessage());
            return redirect()->back()->withInput();
        }

        $this->successFlash('Exam Created Successfully');
        return redirect()->route('backend.exams.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Exam $exam
     * @return Application|Factory|View|Response
     */
    public function show(Exam $exam)
    {
        $exam->load(['questions.options']);
        return view('backend.exams.show',compact('exam'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Exam $exam
     * @return Application|Factory|View
     */
    public function edit(Exam $exam)
    {
        $exam->load(['questions.options']);
        return view('backend.exams.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Exam $exam
     * @return RedirectResponse
     */
    public function update(Request $request, Exam $exam)
    {
      //  dd($request->all());
        $this->validate($request, [
            'name' => 'required|string',
            'options' => 'required|array',
            'options.*' => 'required|array',
            'options.*.*' => 'required|string',
            'option_correct' => 'required|array',
            'questions' => 'required|array',
            'questions.*' => 'required|string',
        ]);


        $questions = $request->get('questions');
        $options = $request->get('options');
        $option_correct = $request->get('option_correct');


        DB::beginTransaction();
        try {

            $exam->update([
                'name' => $request->get('name')
            ]);


            foreach ($questions as $id => $question) {
                $newQuestion = $exam->questions()->updateOrCreate(
                    ['id' => $id],
                    ['question' => $question]
                );
                if (isset($options[$id]) && isset($option_correct[$id])) {
                    foreach ($options[$id] as $opId => $option) {
                        $newOption = $newQuestion->options()->updateOrCreate(
                            ['id' => $opId],
                            ['option' => $option, 'correct' => $opId == $option_correct[$id]]
                        );
                    }
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            $this->errorFlash($e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('backend.exams.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Exam $exam
     * @return RedirectResponse
     */
    public function destroy(Exam $exam)
    {

        if ($exam->submits()->count()){
            $this->errorFlash('you can\'t delete exam has student submit');
            return redirect()->back();
        }
        $exam->delete();
        return redirect()->back();
    }
}
