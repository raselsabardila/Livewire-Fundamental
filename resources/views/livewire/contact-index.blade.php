<div>

    @if (session("status"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session("status") }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($status_update == 1)
        <livewire:contact-update></livewire:contact-update>
    @else
        <livewire:contact-create></livewire:contact-create>
    @endif
    <hr>
    <table class="table table-light table-hover">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $number = 0; ?>
            @foreach ($contact as $item => $result)
                <tr>
                    <td>{{ $number += 1 }}</td>
                    <td>{{ $result->name }}</td>
                    <td>{{ $result->phone }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm" wire:click="getContact({{ $result->id }})" type="button">Edit</button>
                        <button class="btn btn-danger btn-sm" wire:click="deleteContact({{ $result->id }})" type="button">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $contact->links() }}
</div>
