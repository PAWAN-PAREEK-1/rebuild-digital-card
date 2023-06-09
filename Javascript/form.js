//first image

document.addEventListener("DOMContentLoaded", function () {
    var uploadImageInput = document.getElementById("uploadImage");
    var userImageElement = document.getElementById("userImage");

    uploadImageInput.addEventListener("change", function (event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            userImageElement.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});



// secont image

document.addEventListener("DOMContentLoaded", function () {
    var pImageInput = document.getElementById("pImage");
    var proImageElement = document.getElementById("Pro-Image");

    pImageInput.addEventListener("change", function (event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            proImageElement.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});

// third image

document.addEventListener("DOMContentLoaded", function () {
    var gImageInput = document.getElementById("gImage");
    var gImageElement = document.getElementById("G-Image");

    // gImageElement.addEventListener("click", function () {
    //     gImageInput.click();
    // });

    gImageInput.addEventListener("change", function (event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            gImageElement.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});


//fourth image

document.addEventListener("DOMContentLoaded", function () {
    var qrImageInput = document.getElementById("QrImage");
    var qrImageElement = document.getElementById("Qr-Image");

    qrImageInput.addEventListener("change", function (event) {
        var file = event.target.files[0];
        var reader = new FileReader();

        reader.onload = function (e) {
            qrImageElement.src = e.target.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });
});



//fifth image

// Get the input element and the image element using their classes
const inputFile = document.querySelector('.pro3-img');
const img = document.querySelector('.Pro3-Image');

// Add an event listener for the input change event
inputFile.addEventListener('change', handleImageUpload);

// Function to handle the image upload
function handleImageUpload(event) {
    const file = event.target.files[0];

    // Create a file reader
    const reader = new FileReader();

    // Set up the file reader onload function
    reader.onload = function (e) {
        img.src = e.target.result;
    };

    // Read the image file as a data URL
    reader.readAsDataURL(file);
}






//sixth image


const images = document.querySelectorAll('.rew-Img');
const inputs = document.querySelectorAll('.R-Img');

images.forEach((image, index) => {
    image.addEventListener('click', () => {
        inputs[index].click();
    });

    inputs[index].addEventListener('change', () => {
        const file = inputs[index].files[0];
        const reader = new FileReader();

        reader.addEventListener('load', () => {
            image.src = reader.result;
        });

        reader.readAsDataURL(file);
    });
});




$(document).ready(function () {
    var currentStep = 1;
    var totalSteps = $('.container').length;

    $('.container').hide();
    $('.container:first').show();

    $('.btn-next').click(function () {
        if (currentStep < totalSteps) {
            $('.container').hide();
            $('.container:eq(' + currentStep + ')').show();
            currentStep++;
        }
    });

    $('.btn-prev').click(function () {
        if (currentStep > 1) {
            $('.container').hide();
            $('.container:eq(' + (currentStep - 2) + ')').show();
            currentStep--;
        }
    });
});

