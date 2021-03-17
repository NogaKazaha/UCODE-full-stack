let phone = document.getElementById("phone");
let count = document.getElementById("count");
let replace = document.getElementById("replace");
let output = document.getElementsByClassName("notes")[0];
let text_input = document.getElementById("text-input");
let word = document.getElementById("word");
phone.counter = 0;
count.counter = 0;
replace.counter = 0;
let minute = new Date();
minute.setTime(minute.getTime() + 60000);
for (let button of document.getElementsByClassName("apply")) {
  document.cookie.split(" ").forEach(function (item) {
    if (item.includes(button.id)) {
      let number = item.replace(/[^\d]/g, "");
      button.counter = number;
      button.innerHTML = button.innerHTML.replace(/\b\d+\b/gim, number);
    }
  });
  button.addEventListener("click", () => {
    button.counter++;
    button.innerHTML = button.innerHTML.replace(/\b\d+\b/gim, button.counter);
    document.cookie = button.id + "=" + button.counter + '; expires=' + minute;
  });
}
phone.onclick = function () {
  let value = word.value;
  if(value.match(/\b\d+\b/) && value.length === 10){
    value = value.split('')
    value.splice(3,0,'-')
    value.splice(7,0,'-');
    output.textContent = value.join('')
  }
  else {
    output.textContent = 'invalid phone number'
  }
};
count.onclick = function () {
    let value = word.value;
    let text = text_input.value;
    let occCounter = 0;
    text = text.replace(/[.,\/#!%\^&\*;:{}=\-_`~()]/g,"")
    text = text.replace(/\s{2,}/g," ");
    text = text.split(' ')
    text.forEach((item)=>{
        if(item === value){
            console.log(item);
            occCounter++
        }
    })
    output.textContent = 'Word count: ' + occCounter
};
replace.onclick = function () {
    let value = word.value;
    let text = text_input.value;
    text = text.split(' ')
    for(let i = 0; i<text.length; i++){
        text[i] = value
    }
    text = text.join(' ')
    output.textContent = text;
};