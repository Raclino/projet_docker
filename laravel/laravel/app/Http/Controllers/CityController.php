<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    public function get_all_cities(): JsonResponse
    {
        return new JsonResponse(["cities" => City::all()]);
    }

    public function create_city(Request $request): Response|Application|ResponseFactory
    {
        try {
            City::create([
                'name' => $request->input('name'),
                'postal_code' => $request->input('postal_code'),
            ]);
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null, 201);
    }

    public function update_city(int $id, Request $request): Response|Application|ResponseFactory
    {
        $city = City::find($id);
        if ($city == null)
            return response(null, 404);
        try {
            $city->update([
                'name' => $request->input('name'),
                'postal_code' => $request->input('postal_code')
            ]);
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null, 201);
    }

    public function delete_city(int $id): Response|Application|ResponseFactory
    {
        $city = City::find($id);
        try {
            $city->delete();
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null, 201);
    }
}
