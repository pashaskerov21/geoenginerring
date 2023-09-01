<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AboutTranslate;
use App\Models\SettingTranslate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Settings::factory(1)->create();
        \App\Models\About::factory(1)->create();
        
        SettingTranslate::create([
            'setting_id' => 1,
            'lang' => 'az'
        ]);
        SettingTranslate::create([
            'setting_id' => 1,
            'lang' => 'tr'
        ]);
        SettingTranslate::create([
            'setting_id' => 1,
            'lang' => 'en'
        ]);
        SettingTranslate::create([
            'setting_id' => 1,
            'lang' => 'ru'
        ]);

        AboutTranslate::create([
            'about_id' => 1,
            'lang' => 'az'
        ]);
        AboutTranslate::create([
            'about_id' => 1,
            'lang' => 'tr'
        ]);
        AboutTranslate::create([
            'about_id' => 1,
            'lang' => 'en'
        ]);
        AboutTranslate::create([
            'about_id' => 1,
            'lang' => 'ru'
        ]);
    }
}
