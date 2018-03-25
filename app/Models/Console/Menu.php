<?php

namespace App\Models\Console;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Console\Menu
 *
 * @property int $id
 * @property int $parentid
 * @property string|null $arrparentid
 * @property int $child
 * @property string|null $arrchildid
 * @property string $name
 * @property string $url
 * @property string $label
 * @property string|null $icon
 * @property int $display
 * @property int $sort
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Console\Role[] $role
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereArrchildid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereArrparentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereChild($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereParentid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Menu whereUrl($value)
 * @mixin \Eloquent
 */
class Menu extends Model
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

    // 关联role表
    public function role()
    {
        return $this->belongsToMany('\App\Models\Console\Role','role_privs');
    }
}
