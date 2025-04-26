<?php

namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Database\Factories\TaskFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_task_esta_sendo_criada(): void
    {

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('senha123'),
        ]);

        $task = Task::createTask($user->id, 'Programar', 'Programar em php');

        $this->assertDatabaseHas('tasks', [
            'title' => 'Programar',
            'description' => 'Programar em php'
        ]);
    }


    public function test_task_esta_sendo_atualizada(): void
    {

        $user = User::factory()->create();

        $taskFactory = Task::factory()->create([
            'user_id' => $user->id
        ]);

        $task = Task::updateTask($taskFactory->id, $taskFactory->title, $taskFactory->description, $taskFactory->status);

        $this->assertDatabaseHas('tasks', [
            'id' => $taskFactory->id
        ]);
    }

    public function test_task_esta_sendo_deletada(): void
    {


        $user = User::factory()->create();

        $taskFactory = Task::factory()->create([
            'user_id' => $user->id
        ]);

        $task = Task::deleteTask($taskFactory->id);

        $this->assertDatabaseMissing('tasks', [
            'id' => $taskFactory->id
        ]);
    }
}
