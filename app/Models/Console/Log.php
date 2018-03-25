<?php

namespace App\Models\Console;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Console\Log
 *
 * @property int $id
 * @property int $admin_id
 * @property string $user
 * @property string $url
 * @property string|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Log whereAdminId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Log whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Log whereUser($value)
 * @mixin \Eloquent
 */
class Log extends Model
{
	/**
     * 表明模型是否应该被打上时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $hidden = [];
}
