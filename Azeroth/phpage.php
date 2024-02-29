<div class="phpage">
    <form action="submit.php" method="POST">
        <label for="name">From:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required></textarea>
        <br><br>
        <button type="submit" value="Submit">Submit</button>
    </form><br><br>
    <h2>Comments:</h2><br><br>
    <div id="comments-container">
        <?php include('select.php');?>
    </div>
</div>


<script>
const form = document.querySelector('form');
const commentsContainer = document.querySelector('#comments-container');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    const formData = new FormData(form);

    fetch('submit.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            commentsContainer.innerHTML = data;
            updateComments();
        });
});

function updateComments() {
    fetch('select.php')
        .then(response => response.text())
        .then(data => {
            commentsContainer.innerHTML = data;
        });
}
</script>
