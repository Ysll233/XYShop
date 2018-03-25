<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\GoodComment
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property int $good_id 商品ID
 * @property string $title 标题
 * @property string $content 内容
 * @property float $score 评分
 * @property int $delflag 删除状态，1正常-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\User\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodComment whereUserId($value)
 * @mixin \Eloquent
 */
class GoodComment extends Model
{
    // 商品评价表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'good_comment';

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

    // 关联用户
    public function user()
    {
        return $this->belongsTo('\App\Models\User\User','user_id','id');
    }
}
