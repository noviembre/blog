<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{

    public function  __construct()
    {
        //solo el admin podra ejecutar este controlador
        $this->middleware('admin');
    }

    // consola: php artisan make:controller SettingsController, sin --resource

    public function update()
    {
        //dd(request()->all());

        $this->validate(request(), [

            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required',
       ]);

        $settings = Setting::first();

        $settings->site_name =request()->site_name;
        $settings->address =request()->address;
        $settings->contact_email =request()->contact_email;
        $settings->contact_number =request()->contact_number;

        $settings->save();
        Session::flash('success','Your Settings were Update');

        return redirect()->back();
    }

    public function index()
    {
        return view('admin.settings.settings')->with('settings', Setting::first());
    }


}
