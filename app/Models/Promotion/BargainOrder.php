<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion\BargainOrder
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $bargin_id 活动ID
 * @property string $bargin_title 活动标题
 * @property int $good_id 商品ID
 * @property float $old_price 价格
 * @property float $price 价格
 * @property int $nums 已砍多少次
 * @property int $status 状态：1进行中，0关闭，2完成
 * @property int $delflag 删除状态：0正常，1关闭
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Promotion\Bargain $bargain
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereBarginId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereBarginTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereNums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereOldPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainOrder whereUserId($value)
 * @mixin \Eloquent
 */
class BargainOrder extends Model
{
    // 砍价订单
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'bargain_orders';

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
    
    // 用户
    public function user()
    {
        return $this->belongsTo('\App\Models\User\User','user_id','id');
    }
    // 砍价活动
    public function bargain()
    {
        return $this->belongsTo('\App\Models\Promotion\Bargain','bargain_id','id');
    }
}
