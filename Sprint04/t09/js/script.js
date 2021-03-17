let input = document.getElementById("input").value;
let history = document.getElementsByClassName("history")[0];
let count = localStorage.length;
function AddToStorage() {
  let today = new Date();
  let date = String(today.getDate()).padStart(2, "0") + "." + String(today.getMonth() + 1).padStart(2, "0") + "." + (today.getFullYear() - 2000);
  let time = String(today.getHours()).padStart(2, "0") + ":" + String(today.getMinutes()).padStart(2, "0") + ":" + String(today.getSeconds()).padStart(2, "0");
  let full_time = "[" + date + ", " + time + "]";
  input = document.getElementById("input").value;
  if (!input) {
    alert('Please write something');
  } 
  else {
    let name = "history_" + count;
    localStorage.setItem(name, input + " " + full_time);
    history.textContent = Object.values(localStorage).join("\n").replace(/^/gm, "--> ");
    count++;
  }
}
if (localStorage.length === 0) {
  history.textContent = "No history";
}
else {
  history.textContent = Object.values(localStorage).join("\n").replace(/^/gm, "--> ");
}
document.getElementsByClassName("add")[0].onclick = function () {
  AddToStorage();
  console.log(localStorage);
};
document.getElementsByClassName("clear")[0].onclick = function () {
  localStorage.clear();
  count = 0;
  history.textContent = "No history";
};
