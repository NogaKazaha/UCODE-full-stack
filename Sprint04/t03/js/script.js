let position = 0;
const imageContainer = document.getElementsByClassName("images")[0];
let btnPrev = document.getElementsByClassName("prev")[0];
let btnNext = document.getElementsByClassName("next")[0];
let imgContainerWidth = imageContainer.clientWidth;
window.addEventListener('resize', function(){ imgContainerWidth = imageContainer.clientWidth; });
let timer = setInterval(function () { next(); }, 5000);
function next() {
  if (position === imageContainer.children.length - 1) {
    position = 0;
    let imageBlock = document.getElementsByClassName("image")[position];
    for (let i = 0; i < imageContainer.children.length; i++) {
      let imageBlock = document.getElementsByClassName("image")[i];
      imageBlock.style.transform = "translateX(" + 0 + "px)";
    }
    imageBlock.style.transform ="translateX(" + imgContainerWidth * position + "px)";
  } 
  else if (0 <= position < imageContainer.children.length - 1) {
    position++;
    let imageBlockPrev = document.getElementsByClassName("image")[position];
    imageBlockPrev.style.transform ="translateX(-" + imgContainerWidth * position + "px)";
  }
  clearInterval(timer);
  timer = setInterval(function () { next(); }, 5000);
}
function prev() {
  if (position === 0) {
    position = imageContainer.children.length - 1;
    let imageBlock = document.getElementsByClassName("image")[position];
    imageBlock.style.transform ="translateX(-" + imgContainerWidth * position + "px)";
  } 
  else if (0 < position < imageContainer.children.length - 1) {
    let imageBlock = document.getElementsByClassName("image")[position];
    imageBlock.style.transform = "translateX(" + 0 + "px)";
    position--;
    let imageBlockPrev = document.getElementsByClassName("image")[position];
    imageBlockPrev.style.transform ="translateX(-" + imgContainerWidth * position + "px)";
  }
  clearInterval(timer);
  timer = setInterval(function () { next(); }, 5000);
}