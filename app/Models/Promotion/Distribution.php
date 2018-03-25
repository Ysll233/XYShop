<?php

namespace App\Models\Promotion;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Promotion\Distribution
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $parent_id 父级ID
 * @property int $father_id 祖级ID
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Distribution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Distribution whereFatherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Distribution whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Distribution whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Distribution whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Promotion\Distribution whereUserId($value)
 * @mixin \Eloquent
 */
class Distribution extends Model
{
    // 分销关系
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'distribution';

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
