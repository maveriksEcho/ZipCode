<?php


namespace App\Service;

use App\Imports\ZipCodeImport;
use App\Repository\ZipRepository;
use App\Transformer\ZipTransformer;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Maatwebsite\Excel\Facades\Excel;

class ZipService
{
    public $repository;
    public $transformer;
    public $storage;

    public function __construct(ZipRepository $repository, ZipTransformer $transformer, Storage $storage)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->storage = $storage::disk('import');
    }

    public function importFromFile(UploadedFile $file)
    {
        $path = $this->storage->putFileAs('/', $file, Str::random(32) . '.' . $file->getClientOriginalExtension());

        Excel::queueImport(new ZipCodeImport, $this->storage->path($path));
    }

    public function getDataByZip($zip)
    {
        $data = $this->repository->getByZip($zip);

        return $data->transformWith($this->transformer)->toArray();
    }

    public function getDataByCity($city)
    {
        $paginator = $this->repository->getByCity($city);
        $data = $paginator->getCollection();

        return $data->transformWith($this->transformer)
            ->paginateWith(new IlluminatePaginatorAdapter($paginator))
            ->toArray();
    }
}
