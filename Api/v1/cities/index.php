<?php

include "../../../loader.php";

use App\Utilities\Response;

$request_method = $_SERVER['REQUEST_METHOD'];

$request_body = json_decode(file_get_contents('php://input'), true);

switch ($request_method) {
    case 'GET':
        $province_id = $_GET['province_id'] ?? null;
        $request_data = [
            'province_id' => $province_id,
        ];
        $response = getCities($request_data);
        Response::respondAndDie($response, Response::HTTP_OK);

    case 'POST':
        Response::respondAndDie(['POST REQUEST'], Response::HTTP_OK);

    case 'PUT':
        Response::respondAndDie(['PUT REQUEST'], Response::HTTP_OK);

    case 'DELETE':
        Response::respondAndDie(['DELETE REQUEST'], Response::HTTP_OK);

    default:
        Response::respondAndDie(['Invalid request Method'], Response::HTTP_METHOD_NOT_ALLOWED);

}
