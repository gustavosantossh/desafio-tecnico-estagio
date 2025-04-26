<div>
    <div class="modal fade" id="modalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">Criar Tarefa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('dashboard.store')}}" method="POST">
                        @csrf

                        <div>
                            <label for="title">Titulo: </label>
                            <input class="form-control" type="text" value="" name="title" id="title" required>
                        </div>

                        <div>
                            <label for="title">Descrição: </label>
                            <input class="form-control" type="text" value="" name="description" id="description" required>
                        </div>

                        {{-- <div>
                            <label for="status">Status: </label>
                            <select class="form-select" name="status" id="status">
                                <option value="{{App\Enums\TaskStatusEnum::PENDENTE}}">{{App\Enums\TaskStatusEnum::PENDENTE}}</option>
                                <option value="{{App\Enums\TaskStatusEnum::CONCLUIDA}}">{{App\Enums\TaskStatusEnum::CONCLUIDA}}</option>
                            </select>
                        </div> --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Criar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
