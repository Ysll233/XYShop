<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\PromGood
 *
 * @property int $good_id 用户ID
 * @property int $prom_id 活动ID
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\PromGood whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\PromGood wherePromId($value)
 * @mixin \Eloquent
 */
class PromGood extends Model
{
    // 活动商品
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'prom_good';

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
}
