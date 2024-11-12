let audioContext;
let analyser;
let source;
let isAnalyzing = false;
let dataArray;
let bufferLength;

const canvas = document.getElementById('analyzer');
const ctx = canvas.getContext('2d');
const audioElement = document.getElementById('audioElement');
const dropzone = document.getElementById('dropzone');
const audioFile = document.getElementById('audioFile');
const startBtn = document.getElementById('startBtn');
const pauseBtn = document.getElementById('pauseBtn');

// Frequency bands in Hz
const frequencyBands = {
    subBass: { min: 20, max: 60, color: '#ff7f7f' },
    bass: { min: 60, max: 250, color: '#ffbf7f' },
    lowMid: { min: 250, max: 500, color: '#ffff7f' },
    mid: { min: 500, max: 2000, color: '#7fff7f' },
    upperMid: { min: 2000, max: 4000, color: '#7fbfff' },
    presence: { min: 4000, max: 6000, color: '#7f7fff' },
    brilliance: { min: 6000, max: 20000, color: '#ff7fff' }
};

function setupCanvas() {
    canvas.width = canvas.offsetWidth * window.devicePixelRatio;
    canvas.height = canvas.offsetHeight * window.devicePixelRatio;
    ctx.scale(window.devicePixelRatio, window.devicePixelRatio);
}

function initAudioContext() {
    audioContext = new (window.AudioContext || window.webkitAudioContext)();
    analyser = audioContext.createAnalyser();
    analyser.fftSize = 8192; // High resolution for detailed frequency analysis
    bufferLength = analyser.frequencyBinCount;
    dataArray = new Uint8Array(bufferLength);
    
    source = audioContext.createMediaElementSource(audioElement);
    source.connect(analyser);
    analyser.connect(audioContext.destination);
}

function getFrequencyValue(frequency) {
    const nyquist = audioContext.sampleRate / 2;
    const index = Math.round(frequency / nyquist * bufferLength);
    return dataArray[index];
}

function getBandAverageValue(minFreq, maxFreq) {
    const nyquist = audioContext.sampleRate / 2;
    const startIndex = Math.round(minFreq / nyquist * bufferLength);
    const endIndex = Math.round(maxFreq / nyquist * bufferLength);
    let sum = 0;
    let count = 0;

    for (let i = startIndex; i <= endIndex; i++) {
        sum += dataArray[i];
        count++;
    }

    return sum / count;
}

function drawFrequencyBands() {
    if (!isAnalyzing) return;

    analyser.getByteFrequencyData(dataArray);
    ctx.clearRect(0, 0, canvas.width / window.devicePixelRatio, canvas.height / window.devicePixelRatio);

    const width = (canvas.width / window.devicePixelRatio) / Object.keys(frequencyBands).length;
    let x = 0;

    for (const [band, data] of Object.entries(frequencyBands)) {
        const value = getBandAverageValue(data.min, data.max);
        const height = (value / 255) * (canvas.height / window.devicePixelRatio);
        const y = (canvas.height / window.devicePixelRatio) - height;

        // Draw frequency band bar
        ctx.fillStyle = data.color;
        ctx.fillRect(x, y, width - 2, height);

        // Draw frequency value
        ctx.fillStyle = '#fff';
        ctx.font = '12px Arial';
        ctx.fillText(`${value.toFixed(0)}`, x + width/2 - 10, y - 5);

        x += width;
    }

    requestAnimationFrame(drawFrequencyBands);
}

// Event Listeners
window.addEventListener('resize', setupCanvas);

dropzone.addEventListener('click', () => audioFile.click());

dropzone.addEventListener('dragover', (e) => {
    e.preventDefault();
    dropzone.classList.add('active');
});

dropzone.addEventListener('dragleave', () => {
    dropzone.classList.remove('active');
});

dropzone.addEventListener('drop', (e) => {
    e.preventDefault();
    dropzone.classList.remove('active');
    const file = e.dataTransfer.files[0];
    if (file.type.startsWith('audio/')) {
        handleAudioFile(file);
    }
});

audioFile.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (file) handleAudioFile(file);
});

function handleAudioFile(file) {
    const url = URL.createObjectURL(file);
    audioElement.src = url;
    audioElement.load();
}

startBtn.addEventListener('click', () => {
    if (!audioContext) initAudioContext();
    audioContext.resume();
    audioElement.play();
    isAnalyzing = true;
    drawFrequencyBands();
});

pauseBtn.addEventListener('click', () => {
    audioElement.pause();
    isAnalyzing = false;
});

// Initial setup
setupCanvas();