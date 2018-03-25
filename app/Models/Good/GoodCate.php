<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\GoodCate
 *
 * @property int $id
 * @property string $parentid 父ID
 * @property string $arrparentid 所有父ID
 * @property int $child 是否有子栏目
 * @property string $arrchildid 所有子栏目
 * @property string $name 栏目名称
 * @property string|null $thumb 缩略图
 * @property string|null $mobilename 手机端名称
 * @property int|null $ishome 首页显示
 * @property int|null $ismenu 菜单显示
 * @property int $sort 排序
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Good[] $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereArrchildid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereArrparentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereIshome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereIsmenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereMobilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereParentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodCate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodCate extends Model
{
    // 商品分类表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'good_cates';

    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [];
    /**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = true;

    // url
    public function getUrlAttribute()
    {
        return url('list',['id'=>$this->attributes['id']]);
    }

    // 属性值
    public function good()
    {
        return $this->hasMany('\App\Models\Good\Good','cate_id','id');
    }
}
