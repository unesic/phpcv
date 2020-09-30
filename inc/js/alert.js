$(function() {
    let alert = document.getElementById('alert');

    if (alert) {
        alert.classList.add('active');

        setTimeout(() => {
            alert.classList.remove('active');
        }, 3500);
    }
});