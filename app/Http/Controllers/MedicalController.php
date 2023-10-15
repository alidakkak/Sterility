<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalRequest;
use App\Http\Requests\UpdateMedicalRequest;
use App\Http\Resources\MedicalResource;
use App\Models\MedicalData;
use Illuminate\Http\Request;

class MedicalController extends Controller
{
    public function index(){
        // $date = MedicalData::all();
        // return MedicalResource::collection($date);

        return MedicalData::with('personalData')->get();
    }

    public function store(StoreMedicalRequest $request) {
        $request->validated($request->all());
        $data = MedicalData::create($request->all());
        return MedicalResource::make($data);
    }

    public function update(UpdateMedicalRequest $request, MedicalData $data) {
        $request->validated($request->all());
        $data->update($request->all());
        return MedicalResource::make($data);
    }

    public function show(MedicalData $data) {
        return MedicalResource::make($data);
    }

    public function delete(MedicalData $data) {
        $data->delete();
        return response()->json(['message' => 'Deleted Successfully']);

    }
}
