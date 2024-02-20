const forms = document.querySelectorAll('#form-js');

forms.forEach(form => {
    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const url = this.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content;
        const messageId = this.querySelector('#message-id-js').value;
        const count = this.querySelector('#count-js');

        fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token
            },
            method: 'message',
            body: JSON.stringify({
                id: messageId
            })
        }).then(response => {
            response.json().then(data => {
                count.innerHTML = data.count + ' Like(s)';
            })
        }).catch(error => {
            console.log(error)
        });

    });
});