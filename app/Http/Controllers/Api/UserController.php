<?php

namespace App\Http\Controllers\Api;

use App\UseCase\User\DeleteAction;
use App\UseCase\User\IndexAction;
use App\UseCase\User\ShowAction;
use App\UseCase\User\StoreAction;
use App\UseCase\User\UpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
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

    /**
     * 
     * @OA\Get(
     *   tags={"User"},
     *   path="/api/user/{id}",
     *   summary="get user",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="user id",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *     @OA\JsonContent(ref="#/components/schemas/UserResource")
     *   )
     * )
     * 
     */
    public function show(int $id, ShowAction $action): UserResource
    {
        return new UserResource($action($id));
    }


    /**
     * @OA\PUT(
     *   tags={"User"},
     *   path="/api/user/{id}",
     *   summary="update user",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="user id",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *     )
     *   ),
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
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *   )
     * )
     * 
     */
    public function update(UpdateRequest $request, int $id, UpdateAction $action): void
    {
        $action($id, $request->name, $request->email);
    }


    /**
     * @OA\DELETE(
     *   tags={"User"},
     *   path="/api/user/{id}",
     *   summary="delete user",
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     description="user id",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *     )
     *   ),
     *   @OA\Response(
     *     response="200",
     *     description="OK",
     *   )
     * )
     * 
     */
    public function delete(int $id, DeleteAction $action): void
    {
        $action($id);
    }
}
