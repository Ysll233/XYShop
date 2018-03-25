<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\Group
 *
 * @property int $id
 * @property string $name 用户组名
 * @property int $points 所需积分
 * @property int $discount 折扣
 * @property int $status 状态，1正常0禁用
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    // 用户组
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'groups';

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
