<?php

namespace App\Models\Good;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Good\Good
 *
 * @property int $id
 * @property int $cate_id 商品分类ID
 * @property int $brand_id 品牌ID
 * @property string $title 标题
 * @property string|null $pronums 商品编号
 * @property string|null $keyword 关键字
 * @property string|null $describe 描述
 * @property string|null $thumb 缩略图
 * @property string|null $album 相册
 * @property string|null $content 内容
 * @property float $market_price 市场价
 * @property float $shop_price 本店价
 * @property float $cost_price 成本价
 * @property int $store 库存
 * @property float $weight 重量，单位克
 * @property string|null $lasttime 上架时间
 * @property string|null $lowertime 下架时间
 * @property int $is_pos 是否推荐，0否
 * @property int $is_hot 是否热卖
 * @property int $is_new 是否新品
 * @property int $sort 排序
 * @property int $hits 点击
 * @property int $sales 销量
 * @property float $score 评分
 * @property int $commentnums 评论数
 * @property int $prom_type 0普通商品，1限时，2团购，3满赠，4活动
 * @property int $prom_id 优惠活动ID
 * @property int $status 状态，1正常0下架
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Promotion\Bargain[] $bargain
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Cart[] $cart
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Fullgift[] $fullgift
 * @property-read mixed $goodcate_one_id
 * @property-read mixed $goodcate_two_id
 * @property-read mixed $hot_tag
 * @property-read mixed $new_tag
 * @property-read mixed $pos_tag
 * @property-read mixed $prom_tag
 * @property-read mixed $url
 * @property-read \App\Models\Good\GoodCate $goodcate
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\GoodSpecPrice[] $goodspecprice
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\OrderGood[] $order_good
 * @property-read \App\Models\Good\Promotion $promotion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\ReturnGood[] $return_good
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Timetobuy[] $timetobuy
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Good\Tuan[] $tuan
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereAlbum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereCateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereCommentnums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereCostPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereHits($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereIsHot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereIsNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereIsPos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereLasttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereLowertime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereMarketPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good wherePromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good wherePromType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good wherePronums($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereShopPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereStore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Good\Good whereWeight($value)
 * @mixin \Eloquent
 */
class Good extends Model
{
	// 商品表
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'goods';

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

    // 计算会员价
    /* public function getUserPriceAttribute()
    {
        if (!session()->has('member')) {
            return $this->price;
        }
       $prices = ($this->price * session('member')->discount) / 100;
        return $prices;
    }*/

    /**
     * 追加到模型数组表单的访问器
     *
     * @var array
     */

    // 活动
    public function getPromTagAttribute()
    {
        // 0普通商品，1限时，2团购，3满赠，4活动
        switch ($this->attributes['prom_type']) {
            case '4':
                $str = '活动';
                break;

            case '3':
                $str = '满赠';
                break;

            case '2':
                $str = '团购';
                break;

            case '1':
                $str = '限时';
                break;
            
            default:
                $str = '';
                break;
        }
        return  $str;
    }

    // 新品
    public function getNewTagAttribute()
    {
        return $this->attributes['is_new'] ? '新品' : '';
    }

    // 推荐
    public function getPosTagAttribute()
    {
        return $this->attributes['is_pos'] ? '推荐' : '';
    }

    // 热卖
    public function getHotTagAttribute()
    {
        return $this->attributes['is_hot'] ? '热卖' : '';
    }

    // 取链接
    public function getUrlAttribute()
    {
        // 0普通商品，1限时，2团购，3满赠，4活动
        switch ($this->attributes['prom_type']) {
            // 活动
            case '4':
                $url = url('hotgood',['id'=>$this->attributes['id']]);
                break;
            // 满赠
            case '3':
                $url = url('good',['id'=>$this->attributes['id']]);
                break;

            // 团购
            case '2':
                $url = url('tuan',['id'=>$this->attributes['id']]);
                break;

            // 限时
            case '1':
                $url = url('timetobuy',['id'=>$this->attributes['id']]);
                break;
            
            default:
                $url = url('good',['id'=>$this->attributes['id']]);
                break;
        }
        return $url;
    }

    // 二级分类
    public function getGoodcateTwoIdAttribute()
    {
        $two_id = GoodCate::where('id',$this->attributes['cate_id'])->value('parentid');
        return $two_id;
    }

    // 一级分类
    public function getGoodcateOneIdAttribute()
    {
        $one_id = GoodCate::where('id',$this->attributes['cate_id'])->value('arrparentid');
        if (is_null($one_id)) {
            return '';
        }
        $one_id = explode(',', $one_id)[1];
        return $one_id;
    }


    // 购物车
    public function cart()
    {
        return $this->hasMany('\App\Models\Good\Cart','good_id','id');
    }

    // 商品规格价格库存表
    public function goodspecprice()
    {
        return $this->hasMany('\App\Models\Good\GoodSpecPrice','good_id','id');
    }
    // 关联商品分类
    public function goodcate()
    {
        return $this->belongsTo('\App\Models\Good\GoodCate','cate_id','id');
    }
    // 关联订单
    public function order_good()
    {
        return $this->hasMany('\App\Models\Good\OrderGood','good_id','id');
    }

    // 满赠
    public function fullgift()
    {
        return $this->hasMany('\App\Models\Good\Fullgift','good_id','id');
    }

    // 限时
    public function timetobuy()
    {
        return $this->hasMany('\App\Models\Good\Timetobuy','good_id','id');
    }

    // 团购
    public function tuan()
    {
        return $this->hasMany('\App\Models\Good\Tuan','good_id','id');
    }
    // 退货
    public function return_good()
    {
        return $this->hasMany('\App\Models\Good\ReturnGood','good_id','id');
    }
    // 活动
    public function promotion()
    {
        return $this->belongsTo('\App\Models\Good\Promotion','prom_id','id');
    }
    // 砍价
    public function bargain()
    {
        return $this->hasMany('\App\Models\Promotion\Bargain','good_id','id');
    }
}
