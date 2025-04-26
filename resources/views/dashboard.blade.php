<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To-Do List Dashboard') }}
        </h2>
    </x-slot>

    <div class="container py-12">

        <div class="d-flex justify-between">
            <div>
                <button type="button" class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#modalCreate">CRIAR</button>
                <x-modal-create />
            </div>

            <div class="">
                <form action="{{route('dashboard.index')}}" method="GET" id="filter">
                    <select class="form-select" name="status" id="status" onchange="document.getElementById('filter').submit()">
                        <option value=""></option>
                        <option value="pendente" {{ request('status') == 'pendente' ? 'selected' : '' }} >Pendente</option>
                        <option value="concluida"{{ request('status') == 'concluida' ? 'selected' : '' }} >Concluida</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($tasks as $task)
                <div class="col-lg-4 col-12">
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="d-flex justify-between">
                                <h5 class="card-title">{{$task->title}}</h5>
                                <span>{{$task->created_at ? $task->created_at->format('d/m/Y H:i') : ''  }}</span>
                            </div>
                            <p class="card-text py-2">{{$task->description}}</p>
                            <hr>

                            <div class="d-flex gap-3 py-2 justify-content-between">
                                @if ($task->status == \App\Enums\TaskStatusEnum::PENDENTE)
                                    <span class="bg-warning bg-opacity-50 p-2 rounded-md">
                                        <p class="text-warning-emphasis">{{$task->status}}</p>
                                    </span>
                                @else
                                    <span class="bg-success bg-opacity-50 p-2 rounded-md">
                                        <p class="text-success-emphasis">{{$task->status}}</p>
                                    </span>
                                @endif

                                <div>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{$task->id}}">Editar</button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">Deletar</button>

                                    <x-modal-delete  :taskId="$task->id"/>

                                    <x-modal-edit :taskEditId="$task->id" :title="$task->title" :description="$task->description" :status="$task->status" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            {{$tasks->links()}}
        </div>
    </div>
</x-app-layout>
