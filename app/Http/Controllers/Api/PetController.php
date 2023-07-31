<?php

namespace App\Http\Controllers\Api;

use App\UseCase\Pet\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Pet\StoreRequest;

class PetController extends Controller
{
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
