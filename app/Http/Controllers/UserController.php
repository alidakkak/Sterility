<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getFemale() {
        $female = User::where('gender', 'female')->get();
        return $female;
    }

    public function getMale() {
        $male = User::where('gender', 'male')->get();
        return $male;
    }

    public function getLastWeek() {
        $lastWeek = Carbon::now()->subWeek();
        return User::where('created_at','>=', $lastWeek)->get();
    }

    public function update(Request $request, User $user) {
       $user->update($request->all());
       return $user;

    }

    public function show(User $user) {
        return $user;
    }

        public function getRate(Request $request) {
            $status = $request->status;
          //  return $status;
            if($status == 'male') {
                $totalUsers = User::count();
                $maleUsers = User::where('gender', 'male')->count();
                $malePercentage = ($maleUsers / $totalUsers) * 100;
                return $malePercentage;
            } else if ($status == 'female') {
                $totalUsers = User::count();
                $femaleUsers = User::where('gender', 'female')->count();
                $femalePercentage = ($femaleUsers / $totalUsers) * 100;
                return $femalePercentage;

        }
    }

    public function getNationalityPercentage() {
        $totalUsers = User::count();
        $nationalities = User::groupBy('country')
            ->select('country', DB::raw('count(*) as total'))
            ->get();
        return $nationalities;
//        $nationalityPercentages = [];
//        foreach ($nationalities as $nationality) {
//            $percentage = ($nationality->total / $totalUsers) * 100;
//            $nationalityPercentages[$nationality->nationality] = $percentage;
//        }
//        return $nationalityPercentages;
    }

}
