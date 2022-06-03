class PRT_Controller {
    constructor() {

    }

    run() {
        this.blobs = document.querySelectorAll('.project__svg');
        this.blobs.forEach((blob) => {
            this.angle = -360 +  Math.random() * (360 - (-360));
            blob.style.transform = `rotate(${this.angle}deg)`;
        })
    }
}

const script = new PRT_Controller();
window.addEventListener('load', () => script.run());
