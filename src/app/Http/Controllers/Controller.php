<?php

namespace App\Http\Controllers;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="Test api",
 *     version="1.0.0",
 *     description="Teste para a Liberfly",
 *     @OA\Contact(
 *         email="robertolamim@gmail.com",
 *         name="Paulo Lamim",
 *         url="https://prlamim.com.br"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
abstract class Controller
{
}
