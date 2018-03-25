<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Promotion
 *
 * @property int $id
 * @property string $title 标题
 * @property int $type 类型：1打折，2减价
 * @property float $type_val 类型值
 * @property string|null $thumb 图片
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态：1正常，0关闭
 * @property int $delflag 删除状态，1正常-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Good[] $good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereTypeVal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Promotion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Promotion extends Model
{
    // 活动
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'promotions';

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
    // 对应的商品
    public function good()
    {
        return $this->hasMany('\App\Models\Good\Good','prom_id','id');
    }
}
