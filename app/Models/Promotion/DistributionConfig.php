<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion\DistributionConfig
 *
 * @property int $id
 * @property float $son_proportion 一级返现比例（子）
 * @property float $sun_proportion 二级返现比例（孙）
 * @property int $unlock 是否开启，1是，0否
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionConfig whereSonProportion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionConfig whereSunProportion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionConfig whereUnlock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\DistributionConfig whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DistributionConfig extends Model
{
    // 分销设置
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'distribution_config';

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
}
