
document.addEventListener('DOMContentLoaded', function () {
    var ratingContainers = document.querySelectorAll('.rating');

    ratingContainers.forEach(function (container) {
        container.addEventListener('change', function (event) {
            var rating = event.target.value;
            var professionalId = container.dataset.professionalId;

            // Send the rating to the server using AJAX
            // You would need to implement the server-side code to update the database

            // Example AJAX code using Fetch API
            fetch('update_rating.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    professionalId: professionalId,
                    rating: rating,
                }),
            })
            .then(response => response.json())
            .then(data => {
                // Handle the response if needed
                console.log(data);
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
});

//---------------------------
// to handle changing image

document.getElementById('profileImage').addEventListener('click', function() {
    document.getElementById('imageInput').click();
});

document.getElementById('imageInput').addEventListener('change', function(event) {
    var file = event.target.files[0];
    var reader = new FileReader();

    reader.onload = function(e) {
        document.getElementById('profileImage').src = e.target.result;
    };

    reader.readAsDataURL(file);
});
