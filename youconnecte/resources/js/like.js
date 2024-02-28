document.addEventListener('DOMContentLoaded', function() {
    const likeForm = document.getElementById('form-js');

    likeForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const url = likeForm.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content;

        const messageId = likeForm.querySelector('#message-id-js').value;
        const likeCount = likeForm.querySelector('#count-js');

        fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ id: messageId })
        })
        .then(response => response.json())
        .then(data => {
            likeCount.textContent = data.count + ' Like(s)';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
