<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Source
 * @package App\Models
 * @property int id
 * @property string name
 * @property string url
 * @property string link_selector
 * @property string content_selector
 * @property string overview_selector
 * @property string image_selector
 */

class Source extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];
}
