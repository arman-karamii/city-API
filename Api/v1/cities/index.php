<?php

include "../../../loader.php";

use App\Services\CityServices;
use App\Utilities\CacheUtility;
use App\Utilities\Response;

$request_method = $_SERVER['REQUEST_METHOD'];

$request_body = json_decode(file_get_contents('php://input'), true);
$city_services = new CityServices();

switch ($request_method) {
    case 'GET':
        CacheUtility::start();
        $province_id = $_GET['province_id'] ?? null;
        $request_data = [
            'province_id' => $province_id,
            'page' => $_GET['page'] ?? null,
            'page_size' => $_GET['page_size'] ?? null,
            'fields' => $_GET['fields'] ?? null,
            'orderby' => $_GET['orderby'] ?? null,
        ];
        $response = $city_services->getCities($request_data);
        echo Response::respond($response, Response::HTTP_OK);
        CacheUtility::end();
        break;

    case 'POST':
        $response = $city_services->addCity($request_body);
        Response::respondAndDie($response, Response::HTTP_CREATED);

    case 'PUT':
        $response = $city_services->changeCityName($request_body);
        Response::respondAndDie($response, Response::HTTP_OK);

    case 'DELETE':
        $response = $city_services->deleteCity($request_body);
        Response::respondAndDie($response, Response::HTTP_OK);

    default:
        Response::respondAndDie(['Invalid request Method'], Response::HTTP_METHOD_NOT_ALLOWED);

}
