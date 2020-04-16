<?php


namespace App\Transformer;


use App\ZipCode;
use League\Fractal\TransformerAbstract;

class ZipTransformer extends TransformerAbstract
{
    /**
     * @param ZipCode $zipCode
     * @return array
     */
    public function transform(ZipCode $zipCode)
    {
        return [
            'zip' => $zipCode->zip,
            'lat' => $zipCode->lat,
            'lng' => $zipCode->lng,
            'city' => $zipCode->city,
            'state_id' => $zipCode->state_id,
            'state_name' => $zipCode->state_name,
            'zcta' => $zipCode->zcta,
            'parent_zcta' => $zipCode->parent_zcta,
            'population' => $zipCode->population,
            'density' => $zipCode->density,
            'county_fips' => $zipCode->county_fips,
            'county_name' => $zipCode->county_name,
            'county_weights' => $zipCode->county_weights,
            'county_names_all' => $zipCode->county_names_all,
            'county_fips_all' => $zipCode->county_fips_all,
            'imprecise' => $zipCode->imprecise,
            'military' => $zipCode->military,
            'timezone' => $zipCode->timezone,
        ];
    }
}
