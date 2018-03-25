<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\Collect
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $good_id 商品ID
 * @property string $title 商品标题
 * @property string $thumb 图片
 * @property int $delflag 删除状态，1正常-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Collect whereUserId($value)
 * @mixin \Eloquent
 */
class Collect extends Model
{
    // 收藏
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'collect';

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
