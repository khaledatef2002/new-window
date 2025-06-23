<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Service, Portofolio, TopCustomer};
use Illuminate\Http\Request;

class MainController extends Controller {
    function home() {
        $services = Service::inRandomOrder()->limit(8)->get();
        $portofolios = Portofolio::inRandomOrder()->limit(15)->get();
        $top_customers = TopCustomer::all();
        return view('front.home', compact('services', 'portofolios', 'top_customers'));
    }

    function about() {
        return view('front.about');
    }
}
