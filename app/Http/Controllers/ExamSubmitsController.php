<?php

namespace App\Http\Controllers;



use App\Models\Exam;
use App\Models\ExamSubmit;

class ExamSubmitsController extends Controller
{

    public function index(Exam $exam){
        $submits = $exam->submits()->with(['student','exam'])->get();
        return view('backend.submits.index', compact('exam','submits'));
    }
    public function show (Exam $exam,ExamSubmit $submit){

        $submit->load(['answers']);
        return view('backend.submits.show', compact('exam','submit'));
    }
}
