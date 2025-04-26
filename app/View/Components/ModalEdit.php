<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Enums\TaskStatusEnum;
class ModalEdit extends Component
{
    public $taskEditId;
    public string $title;
    public string $description;
    public TaskStatusEnum $status;
    
    /**
     * Create a new component instance.
     */
    public function __construct(int $taskEditId, string $title, string $description, TaskStatusEnum $status)
    {
        $this->taskEditId = $taskEditId;
        $this->title = $title;
        $this->description = $description;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-edit');
    }
}
