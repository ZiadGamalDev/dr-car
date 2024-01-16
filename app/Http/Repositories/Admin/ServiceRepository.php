<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\ServiceInterface;
use App\Models\Admin\Service;
use App\Services\ImageService;
use Illuminate\Support\Facades\File;

class ServiceRepository implements ServiceInterface
{
    function __construct(private ImageService $imageService)
    {
    }

    public function index()
    {
        $servicesWithItems = Service::with('items')->get();
        return response()->json([
            'data' => $servicesWithItems
        ]);
    }

    public function store($request)
    {
        $requestData = request()->all();
        if ($request->has('image')) {
            $requestData['image'] = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs("public/images/admin/services", $requestData['image']);
        }
        if (!isset($request->discount_price) or isset($request->discount_price) and $request->discount_price == 0) {
            $requestData['discount_price'] = $request->price;
        }
        $requestData['image'] = $this->imageService->store($request, 'admin/services');
        $requestData['provider_id'] = auth()->user()->id;
        $service = Service::create($requestData);

        $service->items()->attach($requestData['items']);
        return response()->json(['message' => 'success']);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id)->load('items');
        return response()->json([
            'data' => $service
        ]);
    }

    public function update($request, $id)
    {
        $service = Service::findOrFail($id);
        $requestData = request()->all();
        if ($request->has('image')) {
            if ($service->image) {
                $pathOldImage  = storage_path("app/public/images/admin/services/" . $service->image);
                if (File::exists($pathOldImage)) {
                    unlink($pathOldImage);
                }
            }
            $requestData['image'] = time() . '.' . $request->image->extension();
            $request->file('image')->storeAs("public/images/admin/services", $requestData['image']);
        }

        $requestData['image'] = $this->imageService->update($request, $service, 'admin/services');


        $service->update($requestData);
        $requestData = $request->all();
        foreach (['en', 'ar'] as $locale) {
            $service->translateOrNew($locale)->name = $requestData['name'][$locale];
            $service->translateOrNew($locale)->desc = $requestData['desc'][$locale];
        }
        $service->save();

        $service->items()->sync($requestData['items']);
        return response()->json([
            'message' => 'updated successfully',
            'data' => $service,
        ]);
    }

    public function delete($id)
    {
        $service = Service::findOrFail($id);
        $this->imageService->delete($service, 'admin/services');
        $service->delete();
        return response()->json([
            'message' => 'deleted successfully'
        ]);
    }
}
