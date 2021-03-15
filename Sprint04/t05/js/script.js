let stonessArea = document.getElementById('container');
let state = {
  offsetX: 0,
  offsetY: 0,
  target: null
};

stonessArea.addEventListener('dblclick', event => {
  const target = event.target;

  if (target && target.classList.contains('stones')) {
    if (target.getAttribute('value') === 'on') {
      target.setAttribute('value', 'off');
    } else {
      target.setAttribute('value', 'on');
    }
  }
});

stonessArea.addEventListener('mousedown', event => {
  if (event.target && event.target.classList.contains('stones') &&
      event.target.getAttribute('value') === 'on') {
    state.target = event.target;
    state.offsetX = event.offsetX; 
    state.offsetY = event.offsetY;
  }
});

stonessArea.addEventListener('mouseup', () => {
  state.target = null;
});

stonessArea.addEventListener('mousemove', e => {
  if (state.target) {
    state.target.style.left = (e.pageX - state.offsetX) + 'px';
    state.target.style.top = (e.pageY - state.offsetY) + 'px';
  }
});
