<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\About;
use App\Models\AboutTranslate;
use App\Models\Menu;
use App\Models\MenuTranslate;
use App\Models\Settings;
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
        
        Menu::create(["id" => 1, "parent" => 0]);
        Menu::create(["id" => 2, "parent" => 0]);
        Menu::create(["id" => 3, "parent" => 0]);
        Menu::create(["id" => 4, "parent" => 0]);
        Menu::create(["id" => 5, "parent" => 0]);
        Menu::create(["id" => 6, "parent" => 5]);
        Menu::create(["id" => 7, "parent" => 5]);
        Menu::create(["id" => 8, "parent" => 0]);

        MenuTranslate::create(["menu_id" => 1, "lang" => "az", "title" => "Əsas", "slug" => "esas-sehife"]);
        MenuTranslate::create(["menu_id" => 1, "lang" => "en", "title" => "Home", "slug" => "home"]);
        MenuTranslate::create(["menu_id" => 1, "lang" => "ru", "title" => "главный", "slug" => "glavnaia"]);

        MenuTranslate::create(["menu_id" => 2, "lang" => "az", "title" => "Haqqımızda", "slug" => "haqqimizda"]);
        MenuTranslate::create(["menu_id" => 2, "lang" => "en", "title" => "About us", "slug" => "about-us"]);
        MenuTranslate::create(["menu_id" => 2, "lang" => "ru", "title" => "О нас", "slug" => "o-nas"]);

        MenuTranslate::create(["menu_id" => 3, "lang" => "az", "title" => "Xidmətlər", "slug" => "xidmetler"]);
        MenuTranslate::create(["menu_id" => 3, "lang" => "en", "title" => "Services", "slug" => "services"]);
        MenuTranslate::create(["menu_id" => 3, "lang" => "ru", "title" => "Сервисы", "slug" => "servis"]);

        MenuTranslate::create(["menu_id" => 4, "lang" => "az", "title" => "Layihələr", "slug" => "layiheler"]);
        MenuTranslate::create(["menu_id" => 4, "lang" => "en", "title" => "Projects", "slug" => "projects"]);
        MenuTranslate::create(["menu_id" => 4, "lang" => "ru", "title" => "проекты", "slug" => "proekty"]);

        MenuTranslate::create(["menu_id" => 5, "lang" => "az", "title" => "İnsan Resursları", "slug" => "insan-resurslari"]);
        MenuTranslate::create(["menu_id" => 5, "lang" => "en", "title" => "Human Resources", "slug" => "human-resources"]);
        MenuTranslate::create(["menu_id" => 5, "lang" => "ru", "title" => "Человеческие ресурсы", "slug" => "celoveceskie-resursy"]);

        MenuTranslate::create(["menu_id" => 6, "lang" => "az", "title" => "Vakansiyalar", "slug" => "vakansiyalar"]);
        MenuTranslate::create(["menu_id" => 6, "lang" => "en", "title" => "Vacancies", "slug" => "vacancies"]);
        MenuTranslate::create(["menu_id" => 6, "lang" => "ru", "title" => "вакансии", "slug" => "vakansii"]);

        MenuTranslate::create(["menu_id" => 7, "lang" => "az", "title" => "İş Üçün Müraciət", "slug" => "is-ucun-muraciet"]);
        MenuTranslate::create(["menu_id" => 7, "lang" => "en", "title" => "Apply for a job", "slug" => "apply-for-a-job"]);
        MenuTranslate::create(["menu_id" => 7, "lang" => "ru", "title" => "Заявка на работу", "slug" => "zaiavka-na-rabotu"]);

        MenuTranslate::create(["menu_id" => 8, "lang" => "az", "title" => "Bizimlə Əlaqə", "slug" => "bizimle-elaqe"]);
        MenuTranslate::create(["menu_id" => 8, "lang" => "en", "title" => "Contact us", "slug" => "contact-us"]);
        MenuTranslate::create(["menu_id" => 8, "lang" => "ru", "title" => "Контакт", "slug" => "kontakt"]);



        Settings::create(["id" => 1]);
        SettingTranslate::create(['setting_id' => 1, 'lang' => 'az']);
        SettingTranslate::create(['setting_id' => 1, 'lang' => 'en']);
        SettingTranslate::create(['setting_id' => 1,'lang' => 'ru']);

        About::create(["id" => 1]);
        AboutTranslate::create(['about_id' => 1, 'lang' => 'az']);
        AboutTranslate::create(['about_id' => 1, 'lang' => 'en']);
        AboutTranslate::create(['about_id' => 1, 'lang' => 'ru']);
    }
}
