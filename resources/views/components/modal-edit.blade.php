<div>
    <div class="modal fade" id="modalEdit{{$taskEditId}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-warning" id="staticBackdropLabel">Editar Tarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('dashboard.update', $taskEditId)}}" method="POST">
                        @csrf
                        @method("PATCH")
                        
                        <div class="">
                            <label for="title">Titulo: </label>
                            <input class="form-control" type="text" value="{{$title}}" name="title" id="title" required>
                        </div>

                        <div class="">
                            <label for="title">Descrição: </label>
                            <input class="form-control" type="text" value="{{$description}}" name="description" id="description" required>
                        </div>

                        <div class="">
                            <label for="status">Status: </label>
                            <select class="form-select" name="status" id="status">
                                <option value="{{App\Enums\TaskStatusEnum::PENDENTE}}">{{App\Enums\TaskStatusEnum::PENDENTE}}</option>
                                <option value="{{App\Enums\TaskStatusEnum::CONCLUIDA}}">{{App\Enums\TaskStatusEnum::CONCLUIDA}}</option>
                            </select>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-warning">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
