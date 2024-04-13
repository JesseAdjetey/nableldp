document.addEventListener('DOMContentLoaded', function () {
    var popupContainer = document.getElementById('popup-container');
    var yesButton = document.querySelector('.popup-button[href="login_view.php"]');
    var noButton = document.querySelector('.popup-button[href="task.php"]');

    function showPopup() {
        popupContainer.style.display = 'block';
    }

    function hidePopup() {
        popupContainer.style.display = 'none';
    }

    window.addEventListener('DOMContentLoaded', showPopup);

    yesButton.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = 'login_view.php';
    });

    noButton.addEventListener('click', function (event) {
        event.preventDefault();
        window.location.href = 'task.php';
    });
});
