<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Pay
 *
 * @property int $id
 * @property string $name 名称
 * @property string $code Code
 * @property string|null $thumb 图标
 * @property string|null $content 内容
 * @property string|null $setting 配置
 * @property int $paystatus 状态：1打开，0关闭
 * @property int $status 状态，1正常0删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay wherePaystatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereSetting($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Pay whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pay extends Model
{
    // 支付配置表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'pays';

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
