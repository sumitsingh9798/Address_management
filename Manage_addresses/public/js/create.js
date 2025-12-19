
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Clear previous errors
        document.querySelectorAll('.text-danger').forEach(el => el.innerText = '');

        let isValid = true;

        function showError(field, message) {
            document.getElementById('error-' + field).innerText = message;
            isValid = false;
        }

        let name = document.getElementById('name').value.trim();
        let mobile = document.getElementById('mobile').value.trim();
        let address = document.getElementById('address').value.trim();
        let city = document.getElementById('city').value.trim();
        let state = document.getElementById('state').value.trim();
        let pincode = document.getElementById('pincode').value.trim();
        let type = document.getElementById('type').value.trim();

        if (name === '') showError('name', 'Name is required');

        if (mobile === '') {
            showError('mobile', 'Mobile number is required');
        } else if (!/^[6-9]\d{9}$/.test(mobile)) {
            showError('mobile', 'Enter valid 10 digit mobile number');
        }

        if (address === '') showError('address', 'Address is required');
        if (city === '') showError('city', 'City is required');
        if (state === '') showError('state', 'State is required');

        if (pincode === '') {
            showError('pincode', 'Pincode is required');
        } else if (!/^\d{6}$/.test(pincode)) {
            showError('pincode', 'Enter valid 6 digit pincode');
        }

        if (type === '') showError('type', 'Please select address type');

        if (isValid) {
            e.target.submit(); // finally submit form
        }
    });

