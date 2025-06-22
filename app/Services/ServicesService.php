<?php

namespace App\Services;

use App\Models\Portofolio;
use App\Models\Service;

class ServicesService
{
    public function get_services($last_service_id = null, $limit = 20)
    {
        $services = Service::orderByDesc('id')->when($last_service_id, function($query) use ($last_service_id) {
            return $query->where('id', '<', $last_service_id);
        })->limit($limit)->get();

        return $services;
    }

    public function get_portofolios($service_id, $last_portofolio_id = null, $limit = 20)
    {
        $portofolios = Portofolio::orderByDesc('id')->where('service_id', $service_id)->when($last_portofolio_id, function($query) use ($last_portofolio_id) {
            return $query->where('id', '<', $last_portofolio_id);
        })->limit($limit)->get();

        return $portofolios;
    }
}
