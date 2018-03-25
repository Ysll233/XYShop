<?php

namespace App\Models\Console;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Models\Console\Admin
 *
 * @property int $id
 * @property int $section_id
 * @property string $name
 * @property string $realname
 * @property string $email
 * @property string $password
 * @property string|null $crypt
 * @property string $phone
 * @property string|null $lasttime
 * @property string $lastip
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Console\Role[] $role
 * @property-read \App\Models\Console\Section $section
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereCrypt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereLastip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereLasttime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereRealname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户组
     */
    public function role()
    {
        return $this->belongsToMany('\App\Models\Console\Role','role_users','user_id','role_id');
    }

    // 关联
    public function section()
    {
        return $this->belongsTo('\App\Models\Console\Section','section_id','id');
    }
}
