//Used to add class disappear to navigation on scroll
const main_nav = document.getElementById('main-nav');
window.addEventListener("scroll", () => {
    var y = window.scrollY;
    if (y >= 100) {
        main_nav.classList.add('disappear');
        return;
    } else {
        main_nav.classList.remove('disappear');
    }
})

//automatic update of comments on submission
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