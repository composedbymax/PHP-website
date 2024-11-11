const uploadInput = document.getElementById('upload');
const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const downloadBtn = document.getElementById('download-btn');
const dropZone = document.getElementById('drop-zone');
let currentImage = null;

function makeQuadSymmetrical(image) {
    const width = image.width;
    const height = image.height;
    
    canvas.width = width;
    canvas.height = height;
    
    ctx.drawImage(image, 0, 0, width/2, height/2);
    
    ctx.save();
    ctx.scale(-1, 1);
    ctx.drawImage(image, -width, 0, width/2, height/2);
    ctx.restore();
    
    ctx.save();
    ctx.scale(1, -1);
    ctx.drawImage(image, 0, -height, width/2, height/2);
    ctx.restore();
    
    ctx.save();
    ctx.scale(-1, -1);
    ctx.drawImage(image, -width, -height, width/2, height/2);
    ctx.restore();
}

function makeXAxisSymmetrical(image) {
    const width = image.width;
    const height = image.height;
    
    canvas.width = width;
    canvas.height = height;
    
    ctx.drawImage(image, 0, 0, width, height/2);
    
    ctx.save();
    ctx.scale(1, -1);
    ctx.drawImage(image, 0, -height, width, height/2);
    ctx.restore();
}

function makeYAxisSymmetrical(image) {
    const width = image.width;
    const height = image.height;
    
    canvas.width = width;
    canvas.height = height;
    
    ctx.drawImage(image, 0, 0, width/2, height);
    
    ctx.save();
    ctx.scale(-1, 1);
    ctx.drawImage(image, -width, 0, width/2, height);
    ctx.restore();
}

function downloadImage() {
    const dataURL = canvas.toDataURL('image/png');
    const link = document.createElement('a');
    link.href = dataURL;
    link.download = 'symmetrical-image.png';
    link.click();
}

function handleImage(file) {
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function() {
            currentImage = new Image();
            currentImage.onload = function() {
                makeQuadSymmetrical(currentImage);
                downloadBtn.style.display = 'inline-block';
            };
            currentImage.src = reader.result;
        };
        reader.readAsDataURL(file);
    }
}

// Event Listeners
uploadInput.addEventListener('change', e => handleImage(e.target.files[0]));
downloadBtn.addEventListener('click', downloadImage);

document.getElementById('quad-symmetry').addEventListener('click', () => {
    if (currentImage) makeQuadSymmetrical(currentImage);
});

document.getElementById('x-symmetry').addEventListener('click', () => {
    if (currentImage) makeXAxisSymmetrical(currentImage);
});

document.getElementById('y-symmetry').addEventListener('click', () => {
    if (currentImage) makeYAxisSymmetrical(currentImage);
});

// Drag and Drop
dropZone.addEventListener('dragover', e => {
    e.preventDefault();
    dropZone.classList.add('hover');
});

dropZone.addEventListener('dragleave', () => {
    dropZone.classList.remove('hover');
});

dropZone.addEventListener('drop', e => {
    e.preventDefault();
    dropZone.classList.remove('hover');
    handleImage(e.dataTransfer.files[0]);
});