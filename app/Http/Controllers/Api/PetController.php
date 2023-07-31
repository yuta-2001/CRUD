<?php

namespace App\Http\Controllers\Api;

use App\UseCase\Pet\IndexAction;
use App\UseCase\Pet\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;
use App\Http\Resources\PetResource;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * @OA\Get(
     *   tags={"Pet"},
     *   path="/api/pets",
     *   summary="get pet list",
     *   @OA\Parameter(
     *     name="user_id",
     *     in="query",
     *     description="user id",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/PetResource")
     *     )
     *   )
     * )
     * 
     */
    public function index(Request $request, IndexAction $action)
    {
        return PetResource::collection($action($request->query('user_id')));
    }

    /**
     * @OA\POST(
     *   tags={"Pet"},
     *   path="/api/pets",
     *   summary="store pet",
     *   @OA\RequestBody(
     *     @OA\JsonContent(
     *       @OA\Property(
     *         property="name",
     *         type="string",
     *         example="pet name"
     *       ),
     *       @OA\Property(
     *         property="user_id",
     *         type="integer",
     *         example="1"
     *       ),
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *   )
     * )
     */
    public function store(StoreRequest $request, StoreAction $action)
    {
        $action($request->name, $request->user_id);
    }
}
