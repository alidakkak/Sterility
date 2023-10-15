<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalData extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function setFileAttribute ($file){
        $newImageName = uniqid() . '_' . 'analysis_image' . '.' . $file->extension();
        $file->move(public_path('analysis_images') , $newImageName);
        return $this->attributes['file'] =  '/'.'analysis_images'.'/' . $newImageName;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
