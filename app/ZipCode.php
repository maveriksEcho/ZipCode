<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ZipCode
 *
 * @OA\Schema(
 *     description="ZipCode model",
 *     title="ZipCode model",
 *     required={
 *       "zip",
 *       "lat",
 *       "lng",
 *       "city",
 *       "state_id",
 *       "state_name",
 *       "zcta",
 *       "population",
 *       "density",
 *       "county_fips",
 *       "county_name",
 *       "county_weights",
 *       "county_names_all",
 *       "county_fips_all",
 *       "imprecise",
 *       "military",
 *       "timezone"
 * },
 * @OA\Property(
 *     type="integer",
 *     description="zip",
 *     title="zip",
 *     property="zip",
 * ),
 * @OA\Property(
 *     type="number",
 *     description="lat",
 *     title="lat",
 *     property="lat",
 * ),
 * @OA\Property(
 *     type="number",
 *     description="lng",
 *     title="lng",
 *     property="lng",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="city",
 *     title="city",
 *     property="city",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="state_id",
 *     title="state_id",
 *     property="state_id",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="state_name",
 *     title="state_name",
 *     property="state_name",
 * ),
 * @OA\Property(
 *     type="boolean",
 *     description="zcta",
 *     title="zcta",
 *     property="zcta",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="parent_zcta",
 *     title="parent_zcta",
 *     property="parent_zcta",
 * ),
 * @OA\Property(
 *     type="integer",
 *     description="population",
 *     title="population",
 *     property="population",
 * ),
 * @OA\Property(
 *     type="number",
 *     description="density",
 *     title="density",
 *     property="density",
 * ),
 * @OA\Property(
 *     type="integer",
 *     description="county_fips",
 *     title="county_fips",
 *     property="county_fips",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="county_name",
 *     title="county_name",
 *     property="county_name",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="county_weights",
 *     title="county_weights",
 *     property="county_weights",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="county_names_all",
 *     title="county_names_all",
 *     property="county_names_all",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="county_fips_all",
 *     title="county_fips_all",
 *     property="county_fips_all",
 * ),
 * @OA\Property(
 *     type="boolean",
 *     description="imprecise",
 *     title="imprecise",
 *     property="imprecise",
 * ),
 * @OA\Property(
 *     type="boolean",
 *     description="military",
 *     title="military",
 *     property="military",
 * ),
 * @OA\Property(
 *     type="string",
 *     description="timezone",
 *     title="timezone",
 *     property="timezone",
 * )
 * )
 */
class ZipCode extends Model
{
    protected $fillable = [
        'zip',
        'lat',
        'lng',
        'city',
        'state_id',
        'state_name',
        'zcta',
        'parent_zcta',
        'population',
        'density',
        'county_fips',
        'county_name',
        'county_weights',
        'county_names_all',
        'county_fips_all',
        'imprecise',
        'military',
        'timezone'
    ];

    protected $casts = [
        'county_weights' => 'array',
        'county_names_all' => 'array',
        'county_fips_all' => 'array',
    ];
}
