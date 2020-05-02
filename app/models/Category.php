<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'slug'];
    protected $dates = ['deleted_at'];

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function transform($data)
    {
        $categories = [];

        foreach ($data as $item) {
            $added = new Carbon($item->created_at);

            array_push($categories, [
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'added' => $added->toFormattedDateString()
            ]);
        }

        return $categories;
    }
}