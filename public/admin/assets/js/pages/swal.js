$("#btn-success").click(function() {
    swal(
        'Completed',
        'The product registration operation was successfully completed.',
        'success');
});

$("#btn-error").click(function() {
    swal(
        'Failed',
        'The operation was unsuccessful, please try again.',
        'error');
});

$("#btn-warning").click(function() {
    swal(
        'Warning',
        'This operation is irreversible!',
        'warning');
});

$("#btn-info").click(function() {
    swal(
        '',
        'Your request is being processed, please be patient.',
        'info');
});

$("#btn-question").click(function() {
    swal({
        title: 'Are you sure?',
        text: "This operation is irreversible...",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: '#f44336',
        cancelButtonColor: '#777',
        confirmButtonText: 'Yes, delete it.'
    }).then(function () {
        swal(
          'You chose to delete.',
          'Your file has been successfully deleted.',
          'success'
        ).catch(swal.noop);
    }, function (dismiss) {
        if (dismiss === 'cancel') {
            swal(
                'Cancelled',
                'Your file still exists.',
                'error'
            ).catch(swal.noop);
        }
    }).catch(swal.noop);
});

$("#btn-timer").click(function() {
    swal({
        title: 'Auto Close',
        text: 'This message will automatically close after 2 seconds.',
        timer: 2000
    }).catch(swal.noop);
});

$("#btn-simple").click(function() {
    swal('Tracking number: 12345');
});
