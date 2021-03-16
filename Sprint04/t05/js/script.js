function moveStones() {
  let container = document.getElementById('container');
  let state = {
    offsetX: 0,
    offsetY: 0,
    target: null
  };
  container.addEventListener('on_click', event => {
    const new_target = event.target;
    if (new_target && new_target.classList.contains('stones')) {
      if (new_target.getAttribute('value') === 'on') {
        new_target.setAttribute('value', 'off');
      } else {
        new_target.setAttribute('value', 'on');
      }
    }
  });
  container.addEventListener('mousedown', event => {
    if (event.target && event.target.classList.contains('stones') && event.target.getAttribute('value') === 'on') {
      state.target = event.target;
      state.offsetX = event.offsetX; 
      state.offsetY = event.offsetY;
    }
  });
  container.addEventListener('mouseup', () => {
    state.target = null;
  });
  container.addEventListener('mousemove', e => {
    if (state.target) {
      state.target.style.left = (e.pageX - state.offsetX) + 'px';
      state.target.style.top = (e.pageY - state.offsetY) + 'px';
    }
  });
}

moveStones();
