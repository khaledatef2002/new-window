<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\{Service, Portofolio, TopCustomer};
use Illuminate\Http\Request;

class MainController extends Controller {
    function home() {
        $services = Service::limit(8)->inRandomOrder()->get();
        $portofolios = Portofolio::limit(15)->inRandomOrder()->get();
        $top_customers = TopCustomer::all();
        return view('front.home', compact('services', 'portofolios', 'top_customers'));
    }

    function about() {
        return view('front.about');
    }
}
