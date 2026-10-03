<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Config;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ImageResource::collection(Image::paginate(20));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $is_inserted = false;
        if ($request->hasFile('image')) {
            if ($request->validated()) {
                foreach ($request->file('image') as $key => $image) {
                    $image_extension = $image->getClientOriginalExtension();
                    $image_size = $image->getSize();
                    $image_name = 'IMG_' . date('Ymd') . '_' . rand() . '.' . $image_extension;
                    $image->storeAs('public/images', $image_name);
                    $data[$key]['image_name'] = $image_name;
                    $data[$key]['image_type'] = $image_extension;
                    $data[$key]['image_size'] = $image_size;
                    $data[$key]['image_path'] = 'public/images';
                    $data[$key]['created_at'] = Carbon::now();
                    $data[$key]['updated_at'] = Carbon::now();
                }

                $image = Image::insert($data);
                new ImageResource($image);
                return ResponseController::dataCreated($image);
            }
        }

//         $validatedData = $request->validated();
//         $image = $request->file('image');
//         $image_name = 'IMG_'. date('Ymd').'_'.rand().'.'.$image->getClientOriginalExtension();
//         var_export($validatedData);
//         $validatedData['image'] = $request->file('image')->store('image');
        // $data = Image::create($validatedData);

        // return response($data, Response::HTTP_CREATED);


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
    public function destroy(Image $image)
    {
        $image_name = 'public/images/' . $image->image_name;
        if(Storage::delete($image_name)){
            return ResponseController::dataDeleted($image->delete());
        }
    }
}
