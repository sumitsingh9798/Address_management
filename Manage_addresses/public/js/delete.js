
function deleteAddress(id) {
    if (!confirm('Delete this address?')) return;

    fetch(`/api/address/${id}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(res => {
        if (res.status === 'success') {
            alert('Deleted successfully');
            location.reload();
        } else {
            alert('Delete failed');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Something went wrong');
    });
}
