<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalEdit extends Component
{
    public $taskEditId;
    public $title;
    public $description;
    public $status;
    /**
     * Create a new component instance.
     */
    public function __construct($taskEditId, $title, $description, $status)
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
