let position = 0;
const image = document.getElementsByClassName("images")[0];
let image_width = image.clientWidth;
window.addEventListener('resize', function(){ image_width = image.clientWidth; });
let timer = setInterval(function () { next(); }, 3000);
function next() {
  if (position === image.children.length - 1) {
    let image_block = document.getElementsByClassName("image")[position];
    for (let i = 0; i < image.children.length; i++) {
      image_block = document.getElementsByClassName("image")[i];
      image_block.style.transform = "translateX(" + 0 + "px)";
    }
    image_block.style.transform ="translateX(" + image_width * position + "px)";
  } 
  else if (0 <= position < image.children.length - 1) {
    position++;
    let image_block_prev = document.getElementsByClassName("image")[position];
    image_block_prev.style.transform ="translateX(-" + image_width * position + "px)";
  }
  clearInterval(timer);
  timer = setInterval(function () { next(); }, 3000);
}
function prev() {
  if (position === 0) {
    position = image.children.length - 1;
    let image_block = document.getElementsByClassName("image")[position];
    image_block.style.transform ="translateX(-" + image_width * position + "px)";
  } 
  else if (0 < position < image.children.length - 1) {
    let image_block = document.getElementsByClassName("image")[position];
    image_block.style.transform = "translateX(" + 0 + "px)";
    position--;
    let image_block_prev = document.getElementsByClassName("image")[position];
    image_block_prev.style.transform ="translateX(-" + image_width * position + "px)";
  }
  clearInterval(timer);
  timer = setInterval(function () { next(); }, 3000);
}