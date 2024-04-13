document.addEventListener('DOMContentLoaded', function () {
    document.body.addEventListener('click', function () {
        var buttonContainer = document.getElementById('button-container');
        buttonContainer.style.opacity = '0';
        var opacity = 0;
        var interval = setInterval(function () {
            opacity += 0.05; 
            buttonContainer.style.opacity = opacity;
            if (opacity >= 1) {
                clearInterval(interval); 
                setTimeout(function () {
                    buttonContainer.style.display = 'block'; 
                }, 500); 
            }
        }, 50); 
    });
});
