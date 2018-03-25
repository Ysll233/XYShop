<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Cate
 *
 * @property int $id
 * @property int $parentid
 * @property string $arrparentid
 * @property int $child
 * @property string $arrchildid
 * @property string $name
 * @property string|null $thumb
 * @property string|null $title 标题
 * @property string|null $keyword 关键字
 * @property string|null $describe
 * @property string|null $content
 * @property string $theme 模板
 * @property int $type
 * @property string $url
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Common\Article[] $article
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereArrchildid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereArrparentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereParentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Cate whereUrl($value)
 * @mixin \Eloquent
 */
class Cate extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'categorys';

    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [];

    // 关联articles表
    public function article()
    {
        return $this->hasMany('\App\Models\Common\Article','catid','id');
    }

}
