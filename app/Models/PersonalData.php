<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function setImageAttribute ($file){
        $newImageName = uniqid() . '_' . 'analysis_image' . '.' . $file->extension();
        $file->move(public_path('analysis_images') , $newImageName);
        return $this->attributes['file'] =  '/'.'analysis_images'.'/' . $newImageName;
    }

//    public function medicalData()
//    {
//        return $this->hasOne(MedicalData::class);
//    }

}
