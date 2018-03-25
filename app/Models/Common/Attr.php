<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Common\Attr
 *
 * @property int $id
 * @property string $filename
 * @property string $url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Attr whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Attr whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Attr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Attr whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Common\Attr whereUrl($value)
 * @mixin \Eloquent
 */
class Attr extends Model
{
    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
