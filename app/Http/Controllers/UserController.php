<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getFemale() {
        $female = User::where('gender', 'female')
            ->where('type', 'user')
            ->get();
        return $female;
    }

    public function getMale() {
        $male = User::where('gender', 'male')
            ->where('type', 'user')
            ->get();
        return $male;
    }

    public function getLastWeek() {
        $lastWeek = Carbon::now()->subWeek();
        return User::where('created_at','>=', $lastWeek)
            ->where('type', 'user')
            ->get();
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
                $maleUsers = User::where('gender', 'male')
                    ->count();
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
        $results = DB::table('users as u')
            ->select('u.country', DB::raw('ROUND((COUNT(u.country) * 100 / (SELECT COUNT(country) FROM users)), 2) as total'))
            ->groupBy('u.country')
            ->orderBy('total', 'desc')
            ->get();
        if (count($results)<=3){
            return ["Nationality"=>$results];
        }
        elseif (count($results)>3) {
            $total=
                DB::table('users as u')->select(
                    DB::raw('ROUND((COUNT(u.country) * 100 / (SELECT COUNT(country) FROM users)), 2) as total'))
                    ->whereNOTIn("u.country",$results->pluck("country")->take(3)->toArray())->value("total");
            return  ["Nationality"=>
                array_merge( $results->take(3)->toArray(),["4"=>array_combine(["country","total"],["others",$total])])];
        }
    }

}
