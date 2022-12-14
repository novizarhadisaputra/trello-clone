<div class="modal fade" id="addTask{{ $card->id }}" tabindex="-1" aria-labelledby="addTask{{ $card->id }}Label"
    aria-hidden="true">
    <form action="{{ route('task.store') }}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTask{{ $card->id }}Label">Create new task
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="card_id" value="{{ $card->id }}">
                    <div class="mb-3">
                        <label for="card" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="card"
                            placeholder="Title....." value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create task</button>
                </div>
            </div>
        </div>
    </form>
</div>
