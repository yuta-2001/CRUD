<?php

namespace App\Http\Controllers\Api;

use App\UseCase\User\IndexAction;
use App\UseCase\User\StoreAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    /**
     * 
     * @OA\Get(
     *   tags={"User"},
     *   path="/api/user",
     *   summary="get user list",
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *     @OA\JsonContent(
     *       type="array",
     *       @OA\Items(ref="#/components/schemas/UserResource")
     *     )
     *   )
     * )
     * 
     */
    public function index(IndexAction $action) {
        return UserResource::collection($action());
    }

    /**
     * @OA\POST(
     *   tags={"User"},
     *   path="/api/user",
     *   summary="store user",
     *   @OA\RequestBody(
     *     @OA\JsonContent(
     *       @OA\Property(
     *         property="name",
     *         type="string",
     *         example="yuta"
     *       ),
     *       @OA\Property(
     *         property="email",
     *         type="email",
     *         example="test@test.com"
     *       ),
     *       @OA\Property(
     *         property="password",
     *         type="string",
     *         example="password123"
     *       ),
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *   )
     * )
     */
    public function store(StoreRequest $request, StoreAction $action): void
    {
        $action($request->name, $request->email, $request->password);
    }
}
