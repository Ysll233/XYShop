<?php

namespace App\Models\Console;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Console\Role
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Console\Admin[] $Admin
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Console\Priv[] $priv
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Role whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Role whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Role extends Model
{
    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
     * 用户
     */
    public function Admin()
    {
        return $this->belongsToMany('\App\Models\Console\Admin','role_users','role_id','user_id');
    }

    // 关联privs表
    public function priv()
    {
        return $this->belongsToMany('\App\Models\Console\Priv','role_privs');
    }
}
