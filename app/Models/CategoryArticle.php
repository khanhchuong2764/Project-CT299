<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CategoryArticle extends Model
{
    use HasUuids;
    protected $table = 'category_articles';
    protected $guarded = 'id';
    protected $primaryKey ='id';
    protected $fillable = ['id','title','parentID','description','status','posittion','thumbnail','delete'];
    protected $attributes = [
        'delete' => false
    ];


    public static function getCategoryIdsWithSubcategories($parentID)
    {
        // Truy vấn tất cả các danh mục có parentID là $parentID
        $categories = CategoryArticle::where('parentID', $parentID)->get();

        // Nếu không có danh mục nào, trả về mảng rỗng
        if ($categories->isEmpty()) {
            return collect([$parentID]);  // Trả về chỉ danh mục cha nếu không có con
        }

        // Lấy tất cả các ID của danh mục hiện tại (cấp cha)
        $categoryIds = collect([$parentID]); // Thêm ID của danh mục cha vào kết quả

        // Duyệt qua các danh mục con và gọi đệ quy để lấy danh mục con của mỗi danh mục
        foreach ($categories as $category) {
            // Gọi đệ quy để lấy các danh mục con của mỗi danh mục hiện tại
            $categoryIds = $categoryIds->merge(self::getCategoryIdsWithSubcategories($category->id));
        }

        return $categoryIds;  // Trả về một collection chứa tất cả ID danh mục
    }
}
