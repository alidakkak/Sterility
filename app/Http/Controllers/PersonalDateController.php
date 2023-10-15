<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePersonalDateRequest;
use App\Http\Requests\UpdatePersonalDateRequest;
use App\Http\Resources\PersonalDateResource;
use App\Models\PersonalData;
use Illuminate\Http\Request;

class PersonalDateController extends Controller
{
    public function index(){
        $date = PersonalData::all();
        return PersonalDateResource::collection($date);
    }

    public function store(StorePersonalDateRequest $request) {
        $request->validated($request->all());
        $data = PersonalData::create($request->all());
        return PersonalDateResource::make($data);
    }

    public function update(UpdatePersonalDateRequest $request, PersonalData $data) {
        //return $data;
        $data->update($request->all());
        return PersonalDateResource::make($data);
    }

    public function show(PersonalData $data) {
        return PersonalDateResource::make($data);
    }

    public function delete(PersonalData $data) {
        $data->delete();
        return response()->json(['message' => 'Deleted Successfully']);

    }
}
