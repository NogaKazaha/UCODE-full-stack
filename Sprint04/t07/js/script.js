let key = '6c89977e9737e9588edc5491818a6395';
let lat = '49.988358', lon = '36.232845';
let api = `https://api.openweathermap.org/data/2.5/onecall?lat=${lat}&lon=${lon}&exlude=daily&units=metric&appid=${key}`;
function weather() {
  fetch(api)
  .then(function(resp) { return resp.json() })
  .then(function(data) {
    setData(data);
  });
}
window.onload = function() {
  weather();
}

function setData(data) {
  let arr = data.daily;
  let span = document.getElementsByTagName('span');
  let img = document.getElementsByTagName('img');
  for (let i = 0; i < 7; i++) {
    let date = new Date(arr[i].dt * 1000);
    date = date.getDate() + '.' + (date.getMonth() + 1 < 10 ? '0'.concat('', date.getMonth() + 1) : date.getMonth() + 1);
    document.getElementById(`${i + 1}`).innerHTML = date;
    let temp = '';
    temp = (arr[i].temp.day < 0 ? '-' : '+').concat('', arr[i].temp.day) + '&deg';
    span[i].innerHTML = temp
    let iconurl = "http://openweathermap.org/img/w/" + arr[i].weather[0].icon + ".png";
    img[i].src = iconurl;
  }
}
