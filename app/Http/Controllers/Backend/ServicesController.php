<?php

namespace App\Http\Controllers\Backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Traits\imageTrait;
use App\Http\Controllers\Controller;
use App\Http\Traits\responseApiTrait;

class ServicesController extends Controller
{
    use imageTrait, responseApiTrait;

    public function index()
    {
        // $this->authorize('viewAny', Service::class);

        $services = Service::Selection()->latest()->paginate(10);

        if (count($services) > 0) {
            return view('dar_al_nuzum.index1', compact('services'));
        } else {
            return $this->responseError('no found any saved service yet .', 404);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required', 'unique:services,name_en',
            'name_ar' => 'required', 'unique:services,name_ar,except,id',
            'description_en' => 'required',

        ]);

        if ($request->image) {
            $path = $this->store_image_file2($request->image, 'attachments/services');

            $service = new Service();
            $service->name_en = $request->name_en;
            $service->name_ar = $request->name_ar;
            $service->description_en = $request->description_en;
            $service->description_ar = $request->description_ar;
            $service->image = $path;
            $service->save();
        } else {
            $service = new Service();
            $service->name_ar = $request->name_ar;
            $service->name_en = $request->name_en;
            $service->description = $request->description;

            $service->save();
        }
        return $this->responseSuccess(__('Added successfully'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return $this->responseError(__('Not Found page'), 404);
        }

        $request->validate([
            'name_en' => 'required', 'unique:services,name_en' . $service->id,
            'name_ar' => 'required', 'unique:services,name_ar,except,id',
            'description_en' => 'required',

        ]);

        if ($request->image) {
            $path = $this->store_image_file($request->image);

            $service->update([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
                'image' => $path
            ]);
        } else {
            $service->update([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
                'description_en' => $request->description_en,
                'description_ar' => $request->description_ar,
            ]);
        }
        return $this->responseSuccess(__('Updated Successfully'));
    }

    public function show($id)
    {
        $service = Service::Selection()->find($id);
        if (!$service) {
            return $this->responseError(__('Not Found Page'), 404);
        }

        return $this->responseData('service', $service);
    }

    public function destroy($service)
    {
        $service = Service::find($service);

        if (!$service) {
            return $this->responseError(__('Not Found Page'), 404);
        }

        $image = $service->image;

        if ($image) {
            unlink($image);
        }

        $service->delete();
        return $this->responseSuccess(__('Deleted Successfully'));
    }

    public function serviceBySearch(Request $request)
    {

        $key = $request->key;
        $searchlist = Service::where('name_en', 'LIKE', "%{$key}%")
            ->orWhere('name_ar', 'LIKE', "%{$key}%")
            ->Selection()->get();

        if (count($searchlist) == 0) {
            return $this->responseError('Not Found Any search');
        }

        if ($searchlist) {
            return $this->responseData('users', $searchlist);
        }
    }
}
