<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion\BargainLog
 *
 * @property int $id
 * @property int $bargain_id 砍价活动id
 * @property int $user_id 用户id
 * @property float $price 砍掉金额
 * @property string|null $bargaintime 砍价时间
 * @property-read \App\Models\Promotion\Bargain $bargain
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainLog whereBargainId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainLog whereBargaintime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainLog wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\BargainLog whereUserId($value)
 * @mixin \Eloquent
 */
class BargainLog extends Model
{
    // 砍价日志
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'bargain_logs';

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
    public $timestamps = false;
    
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
