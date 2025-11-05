<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanySearchRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

/**
 * @OA\OpenApi(
 *     openapi="3.0.0",
 *      info=@OA\Info(
 *          version="1.0.0",
 *       title="Base Backend API",
 *       description="Документация для API теста сервера.",
 *      ),
 *      security={
 *           {"sanctum": {}}
 *      }
 *  )
 *
 * @OA\Server(
 *       url="/api/",
 * ),
 *
 */
class ApiController extends Controller
{
    /**
     * @OA\Post(path="/search",
     *     tags={"Search", "Vehicle"},
     *     summary="Поиск по компаниям",
     *
     *     @OA\RequestBody(description="Запрос",
     *          @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *               @OA\Schema(
     *                   @OA\Property(property="q", type="string", description="Поиск по названию", example=""),
     *                   @OA\Property(property="latitude", type="number", format="float", description="Широта", example="34.0522"),
     *                   @OA\Property(property="longitude", type="number", format="float", description="Долгота", example="-118.2437"),
     *                   @OA\Property(property="distance", type="integer", description="Дистанция в км", example="10"),
     *                   @OA\Property(property="offset", type="integer", description="Офсет", example="0"),
     *                   @OA\Property(property="limit", type="integer", description="Лимит", example="10"),
     *               ),
     *          ),
     *      ),
     *
     *     @OA\Response(response = 200, description = "Ответ",
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="companies", type="array", @OA\Items(ref="#/components/schemas/Vehicle"))
     *             ),
     *         ),
     *     ),
     * )
     *
     * @TODO Релизовать поиск
     */
    public function search(CompanySearchRequest $request): JsonResponse
    {
        $query = Vehicle::query();

        $query->search(
            $request->input('q'),
            (float) $request->input('latitude'),
            (float) $request->input('longitude'),
            (int) $request->input('distance')
        );

        $companies = $query->paginate(
            $request->input('limit', 10),
            ['*'],
            'page',
            $request->input('offset', 1)
        );

        return response()->json(VehicleResource::collection($companies));
    }

    /**
     * @OA\Get(path="/get/{vehicle}",
     *     tags={"Vehicle"},
     *     summary="Получение профиля компании",
     *     @OA\Parameter(name="vehicle", @OA\Schema(type="integer"), description="ID компании", required=true, in="path"),
     *     @OA\Response(response = 200, description = "Ответ",
     *         @OA\MediaType(mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(property="company", ref="#/components/schemas/Vehicle"),
     *             ),
     *         ),
     *     ),
     * )
     */
    public function get(Vehicle $vehicle): JsonResponse
    {
        return response()->json(VehicleResource::make($vehicle), 200);
    }
}
