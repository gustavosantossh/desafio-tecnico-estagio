<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'description',
        'status',
        'user_id'
    ];

    protected $casts = [
        'status' => TaskStatusEnum::class
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function createTask(string $user_id, string $title, string $description)
    {
        return self::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id
            // 'status' => $status,
        ]);
    }

    public static function updateTask(string $task_id, string $title, string $description, TaskStatusEnum $status)
    {
        return self::where('id', $task_id)->update([
            'title' => $title,
            'description' => $description,
            'status' => $status,
        ]);

    }

    public static function deleteTask(int $id)
    {
        return self::where('id', $id)->delete();
    }
}
