<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

/**
 * Class SubCategory
 * @package App\Models
 */
class SubCategory extends Model
{
    use SoftDeletes;

    public $timestamps = true;
    protected $fillable = ['name', 'slug', 'category_id'];
    protected $dates = ['deleted_at'];

    /**
     * Make relation with subcategory belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Make relation with subcategory
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * @param $data
     * @return array
     * @throws \Exception
     */
    public function transform($data)
    {
        $subcategories = [];

        foreach ($data as $item) {
            $added = new Carbon($item->created_at);

            array_push($subcategories, [
                'id' => $item->id,
                'category_id' => $item->category_id,
                'name' => $item->name,
                'slug' => $item->slug,
                'added' => $added->toFormattedDateString()
            ]);
        }

        return $subcategories;
    }
}