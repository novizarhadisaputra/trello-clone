<div class="col-md-3 mb-3">
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <div>
                {{ $card->title }}
            </div>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#actionCard{{ $card->id }}">
                ...
            </button>
        </div>
        <ul id="simpleList-{{ $i + 1 }}" class="list-group list-group-flush simpleList">
            @foreach ($card->tasks as $task)
                <li class="list-group-item">{{ $task->title }}</li>
            @endforeach
        </ul>
        <div class="card-footer">
            <button class="btn btn-sm btn-link" data-bs-toggle="modal"
                data-bs-target="#addTask{{ $card->id }}">Create new task</button>
        </div>
    </div>
</div>
