<div class="modal fade" id="actionCard{{ $card->id }}" tabindex="-1"
    aria-labelledby="actionCard{{ $card->id }}Label" aria-hidden="true">
    <form action="{{ route('card.update', ['card' => $card->id]) }}" method="post">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="actionCard{{ $card->id }}Label">Edit card
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="card_id" value="{{ $card->id }}">
                    <div class="mb-3">
                        <label for="card" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="card"
                            placeholder="Title....." value="{{ old('title') ?? $card->title }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"
                        onclick="deleteCard('{{ $card->id }}')">Delete</button>
                    <button type="submit" class="btn btn-primary">Save card</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function deleteCard(id) {
        let urlDelete = `{{ route('card.destroy', ['card' => $card->id]) }}`;
        const formData = new FormData();
        const token = document.getElementsByName('_token')[0].value;
        formData.append('_token', token);
        formData.append('_method', 'DELETE');

        fetch(urlDelete, {
            method: 'POST',
            body: formData
        }).then(response => {
            if (response.ok) {
                location.href = `{{ route('root') }}`
            }
        })
    }
</script>
