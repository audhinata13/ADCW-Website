<form method="POST" class="{{ $class }}" id="formDelete-{{ $id }}">
    @csrf
    @method('delete')
    <button type="button" id="btnDelete-{{ $id }}" data-action="{{ $action }}" class="{{ $buttonClass }}">
        {!! $slot !!}
    </button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButton = document.querySelector('#btnDelete-{{ $id }}');
        const deleteForm = document.querySelector('#formDelete-{{ $id }}');

        deleteButton.addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteForm.action = deleteButton.dataset.action;
                    deleteForm.submit();
                }
            });
        });
    });
</script>
