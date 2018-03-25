<?php

namespace App\Models\Good;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\GoodSpecItem
 *
 * @property int $id
 * @property string $good_id 商品ID
 * @property int $good_spec_id 商品规格id
 * @property string $item 规格值
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $value
 * @property-read \App\Models\Good\GoodSpec $goodspec
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecItem whereGoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecItem whereGoodSpecId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecItem whereItem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\GoodSpecItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GoodSpecItem extends Model
{
    // 商品规格具体值表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'good_spec_item';

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

    // 访问器
    public function getValueAttribute($value)
    {
        $value = json_decode($value,true);
        return implode('，',$value);
    }

    // 关联商品分类表
    public function goodspec()
    {
        return $this->belongsTo('\App\Models\Good\GoodSpec','good_spec_id','id');
    }
}
