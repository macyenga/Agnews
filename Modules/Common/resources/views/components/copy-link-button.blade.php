<button class="btn btn-sm btn-secondary btn-icon round d-flex justify-content-center align-items-center copy-link-button"
        data-url="{{ $url }}"
        rel="tooltip" aria-label="Copy Link" data-bs-original-title="Copy Link">
    <i class="far fa-copy"></i>
</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.copy-link-button').forEach(button => {
            button.addEventListener('click', function () {
                const url = this.getAttribute('data-url');
                navigator.clipboard.writeText(url).then(() => {
                    swal.fire({
                        icon: 'success',
                        title: 'Copied!',
                        text: 'The link has been successfully copied.',
                        confirmButtonText: 'Okay'
                    });
                }).catch(err => {
                    swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while copying the link.',
                        confirmButtonText: 'Okay'
                    });
                });
            });
        });
    });
</script>
