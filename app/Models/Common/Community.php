<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Community
 *
 * @property int $id
 * @property int $areaid1 省
 * @property int $areaid2 市
 * @property int $areaid3 县
 * @property string $name 名称
 * @property int $is_show 是否显示：0否，1是
 * @property int $sort 排序
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereAreaid1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereAreaid2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereAreaid3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Community whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Community extends Model
{
    // 乡、街道
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'communitys';

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
