
    function submitComment() {
        // Get the comment text from the textarea
        let commentText = document.getElementById('comment-text').value;

        // Send a POST request to the backend to create the comment
        axios.post('/comments', {
            commentaire: commentText
        })
        .then(function (response) {
            // Handle success response
            console.log(response.data);
            // Refresh the page or update the UI as needed
            location.reload(); // Reload the page after successful submission
        })
        .catch(function (error) {
            // Handle error
            console.error(error);
            // Display an error message or handle the error appropriately
        });
    }

