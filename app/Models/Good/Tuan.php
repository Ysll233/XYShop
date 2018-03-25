<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Tuan
 *
 * @property int $id
 * @property int $good_id 商品ID
 * @property string $good_title 商品标题
 * @property string $title 标题
 * @property int $tuan_num 开团人数
 * @property int $buy_num 参团人数
 * @property int $store 库存
 * @property float $price 团购价
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态：1正常，0结束
 * @property int $delflag 删除状态：1正常，0删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereBuyNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereTuanNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Tuan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tuan extends Model
{
    // 团购
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'tuan';

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
