<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['task_name', 'task_desc', 'task_status','user_id'];
}

?>