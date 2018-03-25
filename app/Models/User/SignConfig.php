<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\SignConfig
 *
 * @property int $id
 * @property int $onepoint 每次几分
 * @property int $days 连续几天有奖励
 * @property int $reward 奖励几分
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignConfig whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignConfig whereDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignConfig whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignConfig whereOnepoint($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignConfig whereReward($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\SignConfig whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SignConfig extends Model
{
    // 签到配置
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'sign_config';

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
