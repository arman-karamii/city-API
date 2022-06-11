<?php
namespace App\Services;

class CityServices
{

    public function getCities($data)
    {
        $result = getCities($data);
        return $result;
    }
    public function addCity($data)
    {
        $result = addCity($data);
        return $result;
    }
    public function changeCityName($data)
    {
        $result = changeCityName($data['city_id'], $data['name']);
        return $result;
    }
    public function deleteCity($data)
    {
        $result = deleteCity($data['city_id']);
        return $result;
    }
}
