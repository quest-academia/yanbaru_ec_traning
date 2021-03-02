<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'm_categories';
    public $timestamps = false;
    protected $fillable = [
        'id', 
        'category_name',
    ];

    public function product()
    {
        return $this->hasMany('App\Products');
    }

    // m_categoriesテーブルから::pluckでcategory_nameとidを抽出
    public static function categoryList()
    {
        return self::pluck('category_name', 'id');
    }
}
