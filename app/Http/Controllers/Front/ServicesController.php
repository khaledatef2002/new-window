<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use App\Models\Service;
use App\Services\ServicesService;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServicesService $servicesService)
    {
        $services = $servicesService->get_services();
        return view('front.services.index', compact('services'));
    }

    public function getMoreServices(Int $last_service_id, Int $limit, ServicesService $servicesService)
    {
        $services = $servicesService->get_services($last_service_id, $limit);

        if($services->count() > 0)
        {
            return response()->json([
                'message' => __('response.get-more-services-success'),
                'content' => view('components.services-list', compact('services'))->render(),
                'length' => $services->count() >= $limit ? $limit : $services->count(),
                'last_service_id' => $services->last()?->id
            ]);
        }
        else
        {
            return response()->json([
                'errors' => ['data' => [__('response.no-services')]]
            ], 404);
        }
    }
    
    public function getMorePortofolios(Int $service_id, Int $last_service_id, Int $limit, ServicesService $servicesService)
    {
        $portofolios = $servicesService->get_portofolios($service_id, $last_service_id, $limit);

        if($portofolios->count() > 0)
        {
            return response()->json([
                'message' => __('response.get-more-portofolios-success'),
                'content' => view('components.portofolios-list', compact('portofolios'))->render(),
                'length' => $portofolios->count() >= $limit ? $limit : $portofolios->count(),
                'last_portofolio_id' => $portofolios->last()?->id
            ]);
        }
        else
        {
            return response()->json([
                'errors' => ['data' => [__('response.no-portofolios')]]
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service, ServicesService $servicesService)
    {
        $portofolios = $servicesService->get_portofolios($service->id);
        return view('front.services.portofolio', compact('portofolios', 'service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
