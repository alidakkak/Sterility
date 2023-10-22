<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function setImageAttribute ($image){
        $newImageName = uniqid() . '_' . 'question_image' . '.' . $image->extension();
        $image->move(public_path('question_image') , $newImageName);
        return $this->attributes['image'] =  '/'.'question_image'.'/' . $newImageName;
    }
    protected $guarded = ['id'];

    public function questionUser() {
        return $this->hasMany(QuestionUser::class);
    }
}
