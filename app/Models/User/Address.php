<?php

namespace App\Models\User;

use App\Models\Common\Area;
use App\Models\Common\Community;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\Address
 *
 * @property int $id
 * @property int $user_id 用户ID
 * @property string|null $area 区域
 * @property string $address 地址
 * @property string $phone 电话
 * @property string $people 联系人
 * @property int $default 状态：1默认，0普通
 * @property int $delflag 删除状态，1正常-1删除
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read mixed $areaname
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Order[] $order
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereDelflag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address wherePeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\Address whereUserId($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    // 送货地址
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'address';

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

    // 区域名称
    public function getAreanameAttribute()
    {
        $ids = explode('.',$this->attributes['area']);
        $areaname = '';
        foreach ($ids as $k => $v) {
            if ($k < 3) {
                $areaname .= Area::where('id',$v)->value('areaname');
            }
            else
            {
                $areaname .= Community::where('id',$v)->value('name');
            }
        }
        return $areaname;
    }
    public function order()
    {
        return $this->hasMany('\App\Models\Good\Order','address_id','id');
    }
}
