<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $fillable = [
        'requestor_id',
        'profile_id',
        'field_to_edit',
        'original_value',
        'modified_value',
        'reason',
    ];

    protected $table = 'approvals';

    public function requestor()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }

    public function profile()
    {
        return $this->belongsTo(User::class, 'profile_id');
    }
}
