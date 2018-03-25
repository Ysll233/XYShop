<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion\Bargain
 *
 * @property int $id
 * @property int $good_id 商品ID
 * @property string $good_title 商品标题
 * @property string $title 标题
 * @property string $describe 描述
 * @property float $price 价格
 * @property int $store 库存
 * @property float $bargain_price 每次砍价格
 * @property int $maxnum 最多砍几次
 * @property int $numpeople 参与人数
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态：1正常，0关闭
 * @property int $delflag 删除状态：0正常，1关闭
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Good\Good $good
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\BargainLog[] $log
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\BargainOrder[] $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereBargainPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereGoodTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereMaxnum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereNumpeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Bargain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bargain extends Model
{
    // 砍价
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'bargains';

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
    // 日志
    public function log()
    {
        return $this->hasMany('\App\Models\Promotion\BargainLog','bargain_id','id');
    }
    // 参与
    public function order()
    {
        return $this->hasMany('\App\Models\Promotion\BargainOrder','bargain_id','id');
    }
}
