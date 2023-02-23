<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Auditable;

class QaMessage extends Model
{
    use SoftDeletes;
    use Auditable;

    protected $fillable = [
        'topic_id',
        'sender_id',
        'content',
        'read_at',
        'deleted_at',
    ];

    protected $dates = [
        'sent_at',
    ];

    public function topic()
    {
        return $this->belongsTo(QaTopic::class);
    }

    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id')->withTrashed();
    }
}