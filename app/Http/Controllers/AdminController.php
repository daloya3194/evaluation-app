<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        cache()->forget('images');
        return view('admin', [
            'clusters' => Cluster::all()
        ]);
    }

    public function upload_image(Request $request)
    {
        $data = $this->validator($request->all())->validate();

        foreach ($data['images'] as $image) {
            $saved_picture = $this->save_image($image, 'cluster_' . $data['cluster_id']);
            Image::create([
                'cluster_id' => $data['cluster_id'],
                'name' => $saved_picture['name'],
                'name_to_store' => $saved_picture['name_to_store'],
                'extension' => $saved_picture['extension'],
                'path' => $saved_picture['path'],
            ]);
        }

        return redirect(route('admin'));
    }

    private function save_image($image, $folder): array
    {
        $date = Carbon::now('Europe/Berlin');
        $nameWithoutExtension = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $nameToStore = $nameWithoutExtension . '_' .  $date->format('y-m-d-h-i-s') . '.' . $extension;
        Storage::disk('image')->put('/' . $folder . '/' . $nameToStore, file_get_contents($image));
        return [
            'name' => $nameWithoutExtension,
            'name_to_store' => $nameToStore,
            'extension' => $extension,
            'path' => Storage::disk('image')->url('/' . $folder . '/' . $nameToStore)
        ];
    }

    private function validator(array $data)
    {
        return Validator::make($data, [
            'images.*' => 'required',
            'cluster_id' => 'required|numeric',
        ]);
    }
}
