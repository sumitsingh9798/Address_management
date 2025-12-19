
let editId = null;

// make function GLOBAL (VERY IMPORTANT)
window.editAddress = function(addr) {
    console.log('Edit clicked', addr); // debug

    editId = addr.id;

    document.getElementById('name').value = addr.name;
    document.getElementById('mobile').value = addr.mobile;
    document.getElementById('address').value = addr.address;
    document.getElementById('city').value = addr.city;
    document.getElementById('state').value = addr.state;
    document.getElementById('pincode').value = addr.pincode;
    document.getElementById('type').value = addr.type;

    document.getElementById('submitBtn').innerText = "Update Address";

    new bootstrap.Modal(
        document.getElementById('addressModal')
    ).show();
};

/* FORM SUBMIT */
document.getElementById('addressForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const data = {
        name: name.value,
        mobile: mobile.value,
        address: address.value,
        city: city.value,
        state: state.value,
        pincode: pincode.value,
        type: type.value
    };

    let url = '/api/address';
    let method = 'POST';

    if (editId) {
        url = `/api/address/${editId}`;
        method = 'PUT';
    }

    fetch(url, {
        method,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(res => {
        alert(res.message);
        location.reload();
    });
});




