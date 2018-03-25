<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Extract
 *
 * @property int $id
 * @property string|null $area 区域
 * @property string $address 地址
 * @property string $phone 电话
 * @property int $sort 排序
 * @property int $status 状态：1正常，0关闭
 * @property int $delflag 删除状态：1正常，-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Order[] $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Extract whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Extract extends Model
{
    // 自提点
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'extract';

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
    // 订单
    public function order()
    {
        return $this->hasMany('\App\Models\Good\Order','ziti','id');
    }
}
