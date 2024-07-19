<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     schema="Item",
 *     title="Item",
 *     description="Item schema",
 *     @OA\Property(
 *         property="id",
 *         type="integer",
 *         format="int64",
 *         description="ID"
 *     ),
 *     @OA\Property(
 *         property="name",
 *         type="string",
 *         description="Nome"
 *     ),
 *     @OA\Property(
 *         property="description",
 *         type="string",
 *         description="Descrição"
 *     ),
 *     @OA\Property(
 *         property="created_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de criação"
 *     ),
 *     @OA\Property(
 *         property="updated_at",
 *         type="string",
 *         format="date-time",
 *         description="Data de atualização"
 *     ),
 *     @OA\Property(
 *         property="createdAtLocal",
 *         type="string",
 *         description="Data de criação local"
 *     ),
 *     @OA\Property(
 *         property="updatedAtLocal",
 *         type="string",
 *         description="Data de atualização local"
 *     ),
 * )
 */
class Item extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'createdAtLocal',
        'updatedAtLocal',
    ];

    /**
     * Get the local formatted created_at attribute.
     *
     * @return string
     */
    public function getCreatedAtLocalAttribute()
    {
        return $this->created_at->format('d/m/Y - H:i:s');
    }

    /**
     * Get the local formatted updated_at attribute.
     *
     * @return string
     */
    public function getUpdatedAtLocalAttribute()
    {
        return $this->updated_at->format('d/m/Y - H:i:s');
    }
}
