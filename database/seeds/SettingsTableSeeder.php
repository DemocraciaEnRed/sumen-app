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
        $setting->name = 'app_map_lat_default';
        $setting->value = -36.13810;
        $setting->type = 'float';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_map_long_default';
        $setting->value = -63.67392;
        $setting->type = 'float';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_map_zoom_default';
        $setting->value = 4;
        $setting->type = 'float';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_subtitle';
        $setting->value = 'Monitoreo de Planes de Metas. En esta plataforma podés participar y ver el avance de los proyectos en tu ciudad!';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_district_dropdown_enable';
        $setting->value = false;
        $setting->type = 'boolean';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_custom_dropdown_enable';
        $setting->value = false;
        $setting->type = 'boolean';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_custom_dropdown_subtitle';
        $setting->value = 'Este es un dropdown custom';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_custom_dropdown_placeholder';
        $setting->value = 'Elija las siguientes opciones';
        $setting->type = 'string';
        $setting->cached = true;
        $setting->save();
        $setting = new Setting();
        $setting->name = 'app_home_custom_dropdown_options';
        $setting->value = '{"Google":"https://google.com","Yahoo":"https://yahoo.com"}';
        $setting->type = 'json';
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
