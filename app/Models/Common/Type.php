<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Type
 *
 * @property int $id
 * @property int $parentid
 * @property string $arrparentid
 * @property int $child
 * @property string $arrchildid
 * @property string $name
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereArrchildid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereArrparentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereParentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Type whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Type extends Model
{
    // 分类表
    
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
