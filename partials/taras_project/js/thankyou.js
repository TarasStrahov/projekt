document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        
        const formData = new FormData(form);
       
        window.location.href = 'thankyou.html';
    });
});
