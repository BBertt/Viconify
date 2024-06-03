document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.person').forEach(person => {
        person.addEventListener('click', function() {
            document.querySelector('.right-column-chat').style.display = 'flex';
            // Add more interactions as needed
        });
    });
});

