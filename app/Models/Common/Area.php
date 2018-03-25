<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Area
 *
 * @property int $id
 * @property int $parentid 父ID
 * @property string|null $provinceid 阿里云ID
 * @property string $areaname 名称
 * @property int $is_show 是否显示：0否，1是
 * @property int $sort 排序
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereAreaname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereIsShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereParentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereProvinceid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Area whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Area extends Model
{
    // 区域
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'areas';

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
