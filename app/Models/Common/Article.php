<?php

namespace App\Models\Common;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Article
 *
 * @property int $id
 * @property int $catid
 * @property string $title
 * @property string|null $thumb
 * @property string|null $describe
 * @property string $content
 * @property string|null $source
 * @property string $url
 * @property int $status
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Common\Cate $cate
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereCatid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereThumb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Article whereUrl($value)
 * @mixin \Eloquent
 */
class Article extends Model
{

    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [];

    
    // 关联categorys
    public function cate()
    {
        return $this->belongsTo('\App\Models\Common\Cate','catid','id');
    }
}
