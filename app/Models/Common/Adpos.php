<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Adpos
 *
 * @property int $id
 * @property int $is_mobile 0:PC/1:MOB
 * @property string $name 名称
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Adpos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Adpos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Adpos whereIsMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Adpos whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Adpos whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Adpos extends Model
{
    // 广告位
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'ad_pos';

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
