<?php

namespace App\Models\Console;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Console\Priv
 *
 * @property int $id
 * @property int $menu_id
 * @property int $role_id
 * @property string $url
 * @property string $label
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Priv whereUrl($value)
 * @mixin \Eloquent
 */
class Priv extends Model
{
    /**
     * 关联到模型的数据表
     *
     * @var string
     */
    protected $table = 'role_privs';
    
	// 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];
}
