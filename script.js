(function(){
document.addEventListener("mousemove, parallax");
const elem = document.querySelector("#parallax");

function parallax(e){
    let w = window.innerWidth / 2;
    let h = window.innerHeight / 2;
    let mouseX = e.clientX;
    let mouseY = e.clientY;
    let rentoudu =  `${50-(mouseX-w)*0.01}% ${50-(mouseY-h)*0.01}% `;
    let seapic =  `${50-(mouseX-w)*0.02}% ${50-(mouseY-h)*0.02}% `;
   
    let x =  `${rentoudu},${seapic}`;
    console.log(x);
    elem.style.backgroundPosition = x;

}

})();