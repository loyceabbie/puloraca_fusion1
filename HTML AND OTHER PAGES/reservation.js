document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('reservationForm');
    
    // Set minimum date to today
    const dateInput = document.getElementById('date');
    const today = new Date().toISOString().split('T')[0];
    dateInput.min = today;

    // Handle form submission
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Basic form validation
        if (!form.checkValidity()) {
            alert('Please fill in all required fields correctly.');
            return;
        }

        // Collect form data
        const formData = new FormData(form);
        const reservationData = Object.fromEntries(formData);

        // Here you would typically send the data to a server
        console.log('Reservation Details:', reservationData);

        // Show success message
        showSuccessMessage();
        form.reset();
    });

    // Dynamic time slot availability
    const timeSelect = document.getElementById('time');
    const guestsSelect = document.getElementById('guests');

    guestsSelect.addEventListener('change', function() {
        updateTimeSlots();
    });

    function updateTimeSlots() {
        const guests = guestsSelect.value;
        
        // Simulate time slot availability based on group size
        // In a real application, this would check against a backend database
        Array.from(timeSelect.options).forEach(option => {
            if (option.value) {
                const time = parseInt(option.value);
                if (guests > 4 && (time >= '20:00')) {
                    option.disabled = true;
                    option.text += ' (Unavailable for large groups)';
                } else {
                    option.disabled = false;
                    option.text = option.value ? 
                        new Date('2000-01-01T' + option.value)
                            .toLocaleTimeString('en-US', {
                                hour: 'numeric',
                                minute: '2-digit'
                            }) 
                        : 'Select Time';
                }
            }
        });
    }

    function showSuccessMessage() {
        // Create success message element
        const successMessage = document.createElement('div');
        successMessage.className = 'success-message';
        successMessage.textContent = 'Reservation submitted successfully! We will send you a confirmation email shortly.';

        // Insert message at the top of the form
        form.insertBefore(successMessage, form.firstChild);

        // Remove message after 5 seconds
        setTimeout(() => {
            successMessage.remove();
        }, 5000);
    }

    // Add custom validation for phone numbers
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        const phoneNumber = e.target.value.replace(/\D/g, '');
        if (phoneNumber.length < 10) {
            phoneInput.setCustomValidity('Please enter a valid phone number');
        } else {
            phoneInput.setCustomValidity('');
        }
    });

    // Special requests character counter
    const specialRequests = document.getElementById('special-requests');
    specialRequests.addEventListener('input', function() {
        const maxLength = 500;
        const remaining = maxLength - this.value.length;
        
        if (remaining < 0) {
            this.value = this.value.slice(0, maxLength);
        }
    });
});