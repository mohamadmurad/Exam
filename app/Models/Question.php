<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'exam_id',
    ];


    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id', 'id');
    }

    public function exam(){
        return $this->belongsTo(Exam::class, 'exam_id', 'id');
    }



    public function correctOption()
    {
        return $this->hasOne(QuestionOption::class, 'question_id', 'id')
            ->where('correct', 1);
    }

}
