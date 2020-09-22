<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();
        $setting->name = 'app_logo_color';
        $setting->value = null;
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_logo_white';
        $setting->value = null;
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_logo_footer';
        $setting->value = null;
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_favicon';
        $setting->value = null;
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_subtitle';
        $setting->value = 'Monitoreo de Planes de Metas. En esta plataforma podés participar y ver el avance de los proyectos en tu ciudad!';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_footer_contact_info';
        $setting->value = "correo@correo.com\nCiudad Autónoma de Buenos Aires\n1423\n+54 9 01100210515";
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_footer_description';
        $setting->value = 'Monitoreo de Planes de Metas. En esta plataforma podés participar y ver el avance de los proyectos en tu ciudad!';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_social_title';
        $setting->value = 'Sumen - Monitoreo Ciudadano';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_social_description';
        $setting->value = 'Monitoreo de Planes de Metas. En esta plataforma podés participar y ver el avance de los proyectos en tu ciudad!';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_social_image';
        $setting->value = null;
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
    }
}
