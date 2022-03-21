<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function get_all_products(): JsonResponse
    {
        return new JsonResponse(['products' => Product::all()]);
    }

    public function create_product(Request $request): Response|Application|ResponseFactory
    {
        try {
            Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price')
            ]);
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null, 201);
    }

    public function update_product(int $id, Request $request): Response|Application|ResponseFactory
    {
        $product = Product::find($id);
        if ($product == null)
            return response(null, 404);
        try {
            $product->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price')
            ]);
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null, 201);
    }

    public function delete_product(int $id): Response|Application|ResponseFactory
    {
        $product = Product::find($id);
        try {
            $product->delete();
        } catch (QueryException $ex) {
            return response("Error : " . $ex->getCode(), 400);
        }
        return response(null,201);
    }
}
