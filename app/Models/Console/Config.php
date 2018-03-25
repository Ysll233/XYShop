<?php

namespace App\Models\Console;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Console\Config
 *
 * @property int $id
 * @property string|null $sitename 站点名称
 * @property string|null $title SEO标题
 * @property string|null $keyword 关键字
 * @property string|null $describe 描述
 * @property string|null $theme 主题
 * @property string|null $person 联系人
 * @property string|null $phone 联系电话
 * @property string|null $email 邮箱
 * @property string|null $address 地址
 * @property string|null $content 介绍
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereDescribe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereKeyword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config wherePerson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereSitename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereTheme($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Config whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Config extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'config';

    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [];
}
