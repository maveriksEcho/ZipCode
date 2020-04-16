<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Requests\ZipImportRequest;
use App\Service\ZipService;
use Illuminate\Http\JsonResponse;

class ZipController extends Controller
{
    public $service;

    public function __construct(ZipService $service)
    {
        $this->service = $service;
    }

    /**
     * @OA\Post(
     *     path="/import",
     *     tags={"Zip Code"},
     *     summary="Import data to database",
     *     description="import",
     *     operationId="importToDB",
     *     deprecated=true,
     *     @OA\Response(
     *         response=200,
     *         description="successful import"
     *     ),
     *     	@OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property(
     *                      property="file",
     *                      description="File to import (max size 10mb)",
     *                      type="file",
     *                      @OA\Items(type="string", format="binary")
     *                   ),
     *               ),
     *           ),
     *       ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid data"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     )
     * @param ZipImportRequest $request
     * @return JsonResponse
     */
    public function import(ZipImportRequest $request)
    {
        $this->service->importFromFile($request->file('file'));

        return response()->json('successful import', 201);
    }

    /**
     * @OA\Get(
     *     path="/zip/{zip}",
     *     tags={"Zip Code"},
     *     summary="Get data by zip code",
     *     description="get by zip",
     *     operationId="getByZip",
     *     deprecated=true,
     *     @OA\Parameter(
     *         name="zip",
     *         in="path",
     *         description="Zip Code",
     *         required=true,
     *         explode=true,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/ZipCode"),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid data"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     )
     */
    public function getByZip($zip)
    {
        $data = $this->service->getDataByZip($zip);

        return response()->json($data);
    }

    /**
     * @OA\Get(
     *     path="/city/{city}",
     *     tags={"Zip Code"},
     *     summary="Get data by city name",
     *     description="get by city name",
     *     operationId="getByCityName",
     *     deprecated=true,
     *     @OA\Parameter(
     *         name="city",
     *         in="path",
     *         description="City name (must be at least 2 characters)",
     *         required=true,
     *         explode=true,
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="page",
     *         required=false,
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="per_page",
     *         required=false,
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/ZipCode"),
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid data"
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request"
     *     ),
     *     )
     */
    public function getByCity($city)
    {
        $data = $this->service->getDataByCity($city);

        return response()->json($data);
    }
}
