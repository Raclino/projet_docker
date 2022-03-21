<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ShopController extends Controller
{
    public function get_all_shops(): JsonResponse
    {
        return new JsonResponse(['shops' => Shop::all()]);
    }

    public function create_shop(Request $request): Response|Application|ResponseFactory
    {
        $city = City::find($request->input('city_id'));
        $shop = new Shop([
            'name' => $request->input('name'),
            'address'=> $request->input('address'),
            'website'=> $request->input('website'),
        ]);
        try {
                $shop->city()->associate($city)->save();
        } catch (QueryException $ex) {
            return response("Error : ".$ex->getCode(), 400);
        }
        return response(null,201);
    }

    public function update_shop(int $id, Request $request): Response|Application|ResponseFactory
    {
        $shop = Shop::find($id);
        try {
            $shop->update([
                'name' => $request->input('name'),
                'address'=> $request->input('address'),
                'website'=> $request->input('website'),
            ]);
        } catch (QueryException $ex)
        {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null,201);
    }

    public function delete_shop(int $id): Response|Application|ResponseFactory
    {
        $shop = Shop::find($id);
        try {
            $shop->delete();
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null, 201);
    }

    public function add_product(int $id, Request $request): Response|Application|ResponseFactory
    {
        $shop = Shop::find($id);
        try {
            $shop->products()->attach($request->input('product_id'),['quantity' => $request->input('quantity')]);
        } catch (QueryException $ex){
            return response("Error : " . $ex, 400);
        }
        return  response(null,201);
    }

    public function get_products($id): Response|JsonResponse|Application|ResponseFactory
    {
        $shop = Shop::find($id);
        if ($shop == null)
            return response(null,404);
        return new JsonResponse(['products' => $shop->products()->get()]);
    }
}
