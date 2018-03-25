<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\User\User
 *
 * @property int $id
 * @property int $gid 组ID
 * @property string|null $openid 微信openid
 * @property string|null $username 用户名
 * @property string|null $password 密码
 * @property string|null $token API登陆用
 * @property string|null $email 邮箱
 * @property string|null $nickname 昵称
 * @property string|null $thumb 头像
 * @property float $user_money 余额
 * @property int $points 积分
 * @property int $sex 性别
 * @property string $birthday 生日
 * @property string|null $phone 手机号
 * @property string|null $address 地址
 * @property string $shareurl 分销链接
 * @property string|null $last_ip 最后登陆IP
 * @property string|null $last_time 最后登陆时间
 * @property int $status 状态，1正常0禁用
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\BargainOrder[] $bargain
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\Card[] $card
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\Consume[] $consume
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\DistributionLog[] $distribution_son
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\DistributionLog[] $distribution_sun
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\DistributionLog[] $distribution_user
 * @property-read mixed $groupname
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\GoodComment[] $good_comment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Order[] $order
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User\Recharge[] $recharge
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\ReturnGood[] $return_good
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereGid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereLastIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereLastTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereNickname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereOpenid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User wherePoints($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereShareurl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereUserMoney($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User\User whereUsername($value)
 * @mixin \Eloquent
 */
class User extends Model
{
    // 用户表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'users';

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

    // 增加会员等级的属性
    public function getGroupnameAttribute()
    {
        $points = $this->attributes['points'];
        try {
            $groups = collect(cache('group'))->sortByDesc('points');
            $groupname = $groups->where('points','<=',$points)->first()['name'];
        } catch (\Exception $e) {
            $groupname = '普通用户';
        }
        return $groupname;
    }

    // 关联商品评价
    public function good_comment()
    {
        return $this->hasMany('\App\Models\Good\GoodComment','user_id','id');
    }

    // 属性值
    public function return_good()
    {
        return $this->hasMany('\App\Models\Good\ReturnGood','user_id','id');
    }

    // 属性值
    public function card()
    {
        return $this->hasMany('\App\Models\User\Card','user_id','id');
    }
    // 订单
    public function order()
    {
        return $this->hasMany('\App\Models\Good\Order','user_id','id');
    }

    // 关联消费记录
    public function consume()
    {
        return $this->hasMany('\App\Models\User\Consume','user_id','id');
    }
    // 充值记录
    public function recharge()
    {
        return $this->hasMany('\App\Models\User\Recharge','user_id','id');
    }
    // 砍价活动
    public function bargain()
    {
        return $this->hasMany('\App\Models\Promotion\BargainOrder','user_id','id');
    }

    // 被分销人
    public function distribution_user()
    {
        return $this->hasMany('\App\Models\Promotion\DistributionLog','user_id','id');
    }

    // 一级分销人
    public function distribution_son()
    {
        return $this->hasMany('\App\Models\Promotion\DistributionLog','son_id','id');
    }

    // 二级分销人
    public function distribution_sun()
    {
        return $this->hasMany('\App\Models\Promotion\DistributionLog','sun_id','id');
    }
}
