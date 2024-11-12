class ColorPicker {
    constructor() {
        this.picker = document.getElementById('colorPicker');
        this.slider = document.getElementById('colorSlider');
        this.pickerContext = this.picker.getContext('2d');
        this.sliderContext = this.slider.getContext('2d');
        this.pickerCursor = document.getElementById('pickerCursor');
        this.sliderCursor = document.getElementById('sliderCursor');
        this.preview = document.getElementById('preview');
        this.hexValue = document.getElementById('hexValue');
        this.rgbValue = document.getElementById('rgbValue');
        this.hslValue = document.getElementById('hslValue');
        
        this.currentHue = 0;
        this.currentSaturation = 100;
        this.currentLightness = 50;
        
        this.setupCanvas();
        this.createGradient();  // New gradient creation method
        this.setupEventListeners();
        this.draw();
    }

    setupCanvas() {
        this.picker.width = 400;
        this.picker.height = 400;
        this.slider.width = 20;  // Reduced width
        this.slider.height = 400;
    }

    createGradient() {
        // Create a single gradient for reuse
        this.sliderGradient = this.sliderContext.createLinearGradient(0, 0, 0, this.slider.height);
        const hueSteps = ['#ff0000', '#ffff00', '#00ff00', '#00ffff', '#0000ff', '#ff00ff', '#ff0000'];
        hueSteps.forEach((color, index) => {
            this.sliderGradient.addColorStop(index / (hueSteps.length - 1), color);
        });
    }

    setupEventListeners() {
        this.picker.addEventListener('mousedown', this.startPickerDrag.bind(this));
        this.slider.addEventListener('mousedown', this.startSliderDrag.bind(this));
        document.addEventListener('mousemove', this.drag.bind(this));
        document.addEventListener('mouseup', this.endDrag.bind(this));
    }

    startPickerDrag(e) {
        this.isPickerDragging = true;
        this.handlePickerDrag(e);
    }

    startSliderDrag(e) {
        this.isSliderDragging = true;
        this.handleSliderDrag(e);
    }

    drag(e) {
        if (this.isPickerDragging) {
            this.handlePickerDrag(e);
        } else if (this.isSliderDragging) {
            this.handleSliderDrag(e);
        }
    }

    endDrag() {
        this.isPickerDragging = false;
        this.isSliderDragging = false;
    }

    handlePickerDrag(e) {
        const rect = this.picker.getBoundingClientRect();
        const x = Math.max(0, Math.min(this.picker.width, e.clientX - rect.left));
        const y = Math.max(0, Math.min(this.picker.height, e.clientY - rect.top));
        
        this.currentSaturation = (x / this.picker.width) * 100;
        this.currentLightness = 100 - (y / this.picker.height) * 100;
        
        this.pickerCursor.style.left = `${x}px`;
        this.pickerCursor.style.top = `${y}px`;
        
        this.updateColor();
    }

    handleSliderDrag(e) {
        const rect = this.slider.getBoundingClientRect();
        const y = Math.max(0, Math.min(this.slider.height, e.clientY - rect.top));
        
        this.currentHue = (y / this.slider.height) * 360;
        this.sliderCursor.style.top = `${y}px`;
        
        this.drawPicker();
        this.updateColor();
    }

    draw() {
        this.drawPicker();
        this.drawSlider();
        this.updateColor();
    }

    drawPicker() {
        const width = this.picker.width;
        const height = this.picker.height;
        
        for (let y = 0; y < height; y++) {
            for (let x = 0; x < width; x++) {
                const saturation = (x / width) * 100;
                const lightness = 100 - (y / height) * 100;
                
                this.pickerContext.fillStyle = `hsl(${this.currentHue}, ${saturation}%, ${lightness}%)`;
                this.pickerContext.fillRect(x, y, 1, 1);
            }
        }
    }

    drawSlider() {
        // Use the pre-created gradient for better performance
        this.sliderContext.fillStyle = this.sliderGradient;
        this.sliderContext.fillRect(0, 0, this.slider.width, this.slider.height);
    }

    updateColor() {
        const color = `hsl(${this.currentHue}, ${this.currentSaturation}%, ${this.currentLightness}%)`;
        this.preview.style.backgroundColor = color;
        
        const temp = document.createElement('div');
        temp.style.backgroundColor = color;
        document.body.appendChild(temp);
        const rgb = getComputedStyle(temp).backgroundColor;
        document.body.removeChild(temp);
        
        const rgbValues = rgb.match(/\d+/g);
        const hex = this.rgbToHex(parseInt(rgbValues[0]), parseInt(rgbValues[1]), parseInt(rgbValues[2]));
        
        this.hexValue.textContent = hex;
        this.rgbValue.textContent = `${rgbValues[0]}, ${rgbValues[1]}, ${rgbValues[2]}`;
        this.hslValue.textContent = `${Math.round(this.currentHue)}°, ${Math.round(this.currentSaturation)}%, ${Math.round(this.currentLightness)}%`;
    }

    rgbToHex(r, g, b) {
        return '#' + [r, g, b].map(x => {
            const hex = x.toString(16);
            return hex.length === 1 ? '0' + hex : hex;
        }).join('');
    }
}

// Initialize the color picker
new ColorPicker();