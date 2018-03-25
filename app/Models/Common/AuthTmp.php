<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\AuthTmp
 *
 * @property string $auth_id
 * @property string $openid
 * @property int $overtime
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\AuthTmp whereAuthId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\AuthTmp whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\AuthTmp whereOvertime($value)
 * @mixin \Eloquent
 */
class AuthTmp extends Model
{
    // auth的临时数据
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'auth_tmps';

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
    public $timestamps = false;
}
