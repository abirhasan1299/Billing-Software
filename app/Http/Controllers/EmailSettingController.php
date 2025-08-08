<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class EmailSettingController extends Controller
{
    public function updateEmailSetting(Request $request)
    {
        $data = $request->validate([
            'host'         => 'required',
            'port'         => 'required|numeric',
            'username'     => 'required',
            'password'     => 'required',
            'encryption'   => 'nullable',
            'from_address' => 'required|email',
            'from_name'    => 'required'
        ]);
        Email::updateOrCreate(['id'=>1],$data);
        return redirect()->route('dashboard')->with('success','Email setting updated successfully.');
    }

    public static function setMailConfig()
    {
        $settings = Email::first();
        if($settings)
        {
            Config::set('mail.mailers.smtp.transport', 'smtp');
            Config::set('mail.mailers.smtp.host', $settings->host);
            Config::set('mail.mailers.smtp.port', $settings->port);
            Config::set('mail.mailers.smtp.username', $settings->username);
            Config::set('mail.mailers.smtp.password', $settings->password);
            Config::set('mail.mailers.smtp.encryption', $settings->encryption);
            Config::set('mail.from.address', $settings->from_address);
            Config::set('mail.from.name', $settings->from_name);
        }
    }
}
