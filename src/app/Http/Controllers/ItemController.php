<?php
namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/items",
     *     summary="Listar todos os itens",
     *     tags={"Items"},
     *     security={{"Bearer": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="Operação bem-sucedida",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Item")
     *         )
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        $items = Item::all();

        return response()->json([
            'success' => true,
            'message' => 'Lista retornada com sucesso!',
            'data' => $items,
        ], Response::HTTP_OK);
    }

    /**
     * @OA\Get(
     *     path="/api/items/{id}",
     *     summary="Listar item por ID",
     *     tags={"Items"},
     *     security={{"Bearer": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Operação bem-sucedida",
     *         @OA\JsonContent(ref="#/components/schemas/Item")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item não encontrado"
     *     )
     * )
     */
    public function show(int $id): JsonResponse
    {
        $item = Item::find($id);
        
        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Item inválido!'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'success' => true,
            'message' => 'Item encontrado com sucesso!',
            'data' => $item,
        ], Response::HTTP_OK);
    }
}
