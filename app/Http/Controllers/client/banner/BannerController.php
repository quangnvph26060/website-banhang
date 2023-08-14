<?php

namespace App\Http\Controllers\client\banner;

use App\Http\Controllers\Controller;
use App\Models\LoaiModel;
use App\Models\SettingModel;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function showBanner(){
        $banner = SettingModel::all();
        return view('cleint.banner',compact('banner'));
    }
}
