<?php

namespace App\Models\Console;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Console\Section
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Console\Admin[] $admin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Section whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Section whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Section whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Section whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Console\Section whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Section extends Model
{
    // 不可以批量赋值的字段，为空则表示都可以
    protected $guarded = [];

    // 关联Admins表
    public function admin()
    {
    	return $this->hasMany('\App\Models\Console\Admin','section_id','id');
    }
}
