<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\TuanUser
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $t_id 团购ID
 * @property int $status 参加状态：1正常，0取消
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\TuanUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\TuanUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\TuanUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\TuanUser whereTId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\TuanUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\TuanUser whereUserId($value)
 * @mixin \Eloquent
 */
class TuanUser extends Model
{
    // 参团用户
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'tuan_user';

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
