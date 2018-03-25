<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Ad
 *
 * @property int $id
 * @property int $pos_id 位置ID
 * @property string $title 标题
 * @property string $subtitle 副标题
 * @property string $thumb 图片
 * @property string $url 链接
 * @property string|null $starttime 开始时间
 * @property string|null $endtime 结束时间
 * @property int $sort 排序
 * @property int $status 状态，1正常0关闭
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereEndtime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad wherePosId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereStarttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Ad whereUrl($value)
 * @mixin \Eloquent
 */
class Ad extends Model
{
    // 广告
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'ads';

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
