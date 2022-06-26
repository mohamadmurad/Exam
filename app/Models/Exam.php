<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];



    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id', 'id');
    }

    public function submits()
    {
        return $this->hasMany(ExamSubmit::class, 'exam_id', 'id')
            ->with('answers');
    }

    public function authSubmit()
    {
        return $this->submits()
            ->where('student_id', Auth::id());
    }

    public function userSubmit($id)
    {
        return $this->submits()
            ->where('student_id', $id);
    }
}
