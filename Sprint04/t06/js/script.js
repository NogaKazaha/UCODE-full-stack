document.addEventListener("DOMContentLoaded", function() {
  let loading = document.querySelectorAll("img");
  loading.forEach(function(img) {
    img.classList.add('loading');
  });
  let timeout;
  let num = document.getElementById('num');
  let images = document.getElementsByTagName('img');
  let collection;
  let check = true;
  function loadingload () {
    if(timeout)
      clearTimeout(timeout);
    timeout = setTimeout(function() {
      let scrollTop = window.pageYOffset;
      loading.forEach(function(img) {
        if(img.offsetTop < (window.innerHeight + scrollTop)) {                
          img.src = img.dataset.src;
          img.classList.remove('loading');
          collection = document.getElementsByClassName('loading');
          num.innerHTML = '';
          num.insertAdjacentHTML('afterbegin', `${images.length - collection.length}`);
          if (check && collection.length === 0) {
            check = false;
            let label = document.getElementsByTagName('label')[0];
            label.classList.add('finish');
          }
        }
      });
    }, 250);
  }
  document.addEventListener("scroll", loadingload);
});