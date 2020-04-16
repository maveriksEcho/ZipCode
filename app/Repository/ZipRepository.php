<?php


namespace App\Repository;


use App\ZipCode;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ZipRepository
{
    public $model;

    public function __construct(ZipCode $model)
    {
        $this->model = $model;
    }

    public function getByZip($zip): Collection
    {
        return $this->model
            ->where('zip', $zip)
            ->get();
    }

    public function getByCity($city): LengthAwarePaginator
    {
        return $this->model
            ->where('city', 'LIKE', '%' . $city . '%')
            ->paginate(\Request::get('per_page'), ['*'], 'page', \Request::get('page'));
    }
}
