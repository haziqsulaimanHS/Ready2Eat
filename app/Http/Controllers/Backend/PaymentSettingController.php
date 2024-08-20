<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use App\Models\FpxSetting;
use App\Models\PaypalSetting;
use App\Models\RazorpaySetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $codSetting = CodSetting::first();
        $fpxSetting = FpxSetting::first();



        return view('admin.payment-settings.index', compact( 'codSetting', 'fpxSetting'));
    }
}
