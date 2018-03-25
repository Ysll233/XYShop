<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Fullgift
 *
 * @property int $id
 * @property int $good_id 商品ID
 * @property string $good_title 商品名称
 * @property string $title 标题
 * @property int $store 库存
 * @property int $price 满多少
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态：1正常，0结束
 * @property int $delflag 删除状态，1正常-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Fullgift whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Fullgift extends Model
{
    // 满赠
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'fullgift';

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

    // 商品
    public function good()
    {
        return $this->belongsTo('\App\Models\Good\Good','good_id','id');
    }
}
