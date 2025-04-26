<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
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

    /**
     * @param string $user_id
     * @param string $title
     * @param string $description
     *
     * @return \App\Models\Task
     */
    public static function createTask(string $user_id, string $title, string $description)
    {
        return self::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $user_id
            // 'status' => $status,
        ]);
    }

    /**
     * @param string $task_id
     * @param string $title
     * @param string $description
     * @param TaskStatusEnum $status
     *
     * @return \App\Models\Task
     */
    public static function updateTask(string $task_id, string $title, string $description, TaskStatusEnum $status)
    {
        return self::where('id', $task_id)->update([
            'title' => $title,
            'description' => $description,
            'status' => $status,
        ]);

    }

    /**
     * @param int $id
     *
     * @return \App\Models\Task
     */
    public static function deleteTask(int $id)
    {
        return self::where('id', $id)->delete();
    }
}
