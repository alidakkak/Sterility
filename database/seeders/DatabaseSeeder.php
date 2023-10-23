<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@gmail.com',
             'password' => '00000000',
             'type' => 'admin',
             'country' => 'Saudi arabia',
             'date' => '2000'
         ]);

         Question::create([
             'name' => 'الوزن',
             'gender' => 'both'
         ]);

        Question::create([
            'name' => 'الطول',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'هل لديك أولاد',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'هل لديك مرض (اكتب نوع المرض)',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'هل تتعاطى اي دواء (اذكر اسم الدواء)',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'عدد سنوات الزواج',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'هل تعالجت من قبل',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'مانوع العلاج',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'كم مرة تم أخذ العلاج',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'هل يوجد أمراض أخرى (سكر - ضغط - غيره)',
            'gender' => 'both'
        ]);

        Question::create([
            'name' => 'هل لديك دوالي الخصيتين',
            'gender' => 'male'
        ]);

        Question::create([
            'name' => 'هل يوجد تحاليل سابقة للسائل المنوي الذكري',
            'gender' => 'male'
        ]);

        Question::create([
            'name' => 'هل يوجد أكياس على المبيض',
            'gender' => 'female'
        ]);

        Question::create([
            'name' => 'هل الدورة منتظمة',
            'gender' => 'female'
        ]);

        Question::create([
            'name' => 'هل تم عمل تحليل الغدة الدرقية T3- T4',
            'gender' => 'female'
        ]);

        Question::create([
            'name' => 'هل يوجد التهابات نسائية أو حرقة بالبول',
            'gender' => 'female'
        ]);

        Question::create([
            'name' => 'هل يوجد فقر دم (أنيما)',
            'gender' => 'female'
        ]);
    }
}
