<?php

namespace App\Http\Controllers;
use Illuminate\Cache\Repository;
use Illuminate\Contracts\Filesystem\Filesystem;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Http\Requests\UploadFileRequest;
use Illuminate\Container\Attributes\Cache;
use App\Attributes\Disk;

class MediaController extends Controller
{

    public function __construct(
        #[Disk('local')] protected Filesystem $filesystem,
        #[cache('redis')] protected Repository $cache,
    ) {
        //
    }
    public function store(UploadFileRequest $request, $model, $id)
    {

        $upload = app('App\\Models\\' . $model)::find($id);

        $upload->addMedia($request->file)->toMediaCollection();

        return redirect()->route('projects.show', $id);
    }

    public function download(Media $mediaItem)
    {
        return $mediaItem;
    }

    public function destroy($model, $id, Media $mediaItem)
    {
        $mediaItem->delete();

        return redirect()->route(strtolower($model) . 's.edit', $id);
    }
}
