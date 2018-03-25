<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Timetobuy
 *
 * @property int $id
 * @property int $good_id 商品ID
 * @property string $good_title 商品标题
 * @property string $title 标题
 * @property float $price 抢购价
 * @property int $good_num 库存
 * @property int $buy_max 每人限购数量
 * @property int $buy_num 已买人数
 * @property int $order_num 已下单数量
 * @property string $describe 描述
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态
 * @property int $delflag 删除状态：1正常，0删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereBuyMax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereBuyNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereGoodNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereOrderNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Timetobuy whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Timetobuy extends Model
{
    // 限时抢购表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'timetobuy';

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
