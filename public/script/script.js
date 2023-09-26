let animalPic = document.getElementById("animal-picture");
let uploadImage = document.getElementById("upload-image");

uploadImage.onchange = function() {
    console.log("hi");
    animalPic.src = URL.createObjectURL(uploadImage.files[0]);
    const width = animalPic.offsetWidth;
    animalPic.style.height = width + 'px';
}

document.getElementById('closeModal').addEventListener('click', closeModal);

function closeModal() {
    document.getElementById('myModal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target === document.getElementById('myModal')) {
        closeModal();
    }
};