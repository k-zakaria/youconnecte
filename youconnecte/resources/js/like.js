document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez le formulaire de like
    const likeForm = document.getElementById('form-js');

    // Ajoutez un gestionnaire d'événements clic sur le bouton de like
    likeForm.addEventListener('submit', function(event) {
        // Empêche le formulaire d'être envoyé normalement
        event.preventDefault();

        // Récupérez l'URL et le token CSRF du formulaire
        const url = likeForm.getAttribute('action');
        const token = document.querySelector('meta[name="csrf-token"]').content;

        // Récupérez l'identifiant du message à partir du champ caché
        const messageId = likeForm.querySelector('#message-id-js').value;

        // Récupérez le compteur de likes pour mettre à jour l'affichage
        const likeCount = likeForm.querySelector('#count-js');

        // Effectuez une requête AJAX pour soumettre le formulaire
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
            // Mettez à jour le compteur de likes avec la réponse du serveur
            likeCount.textContent = data.count + ' Like(s)';
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

