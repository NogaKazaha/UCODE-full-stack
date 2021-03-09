function cleanArray(arr) {
  let first_arr = [];
  for (let i = 0; i < arr.length; i++) {
    if (arr[i]) {
      first_arr.push(arr[i]);
    }
  }
  let second_arr = [];
  for (let i = 0; i < first_arr.length; i++) {
    let current = first_arr[i];
    if (!~second_arr.indexOf(current)) {
      second_arr.push(current);
    }
  }
  return second_arr;
}
function addWords(obj, wrds) {
  let addItem = Object.values(obj);
  addItem = String(addItem);
  addItem = addItem + " " + wrds;
  addItem = addItem.split(" ");
  addItem = cleanArray(addItem);
  obj["words"] = addItem.join(" ");
  return obj;
}
function removeWords(obj, wrds) {
  let removeItem = Object.values(obj);
  removeItem = String(removeItem);
  removeItem = removeItem.split(" ");
  removeItem = cleanArray(removeItem);
  let removed = cleanArray(wrds.split(" "));
  for (let i = 0; i < removed.length; i++) {
    let element = removed[i];
    let index = removeItem.indexOf(element);
    if (index > -1) {
      removeItem.splice(index, 1);
    }
  }
  obj["words"] = removeItem.join(" ");
  return obj;
}
function changeWords(obj, oldWrds, newWrds) {
  let changeItem = Object.values(obj);
  changeItem = String(changeItem);
  changeItem = changeItem.split(" ");
  changeItem = cleanArray(changeItem);
  let newItem = cleanArray(newWrds.split(" "));
  let oldItem = cleanArray(oldWrds.split(" "));
  for (let i = 0; i < oldItem.length; i++) {
    let element = oldItem[i];
    let index = changeItem.indexOf(element);
    if (index > -1) {
      changeItem.splice(index, 1);
    }
  }
  for (let i = 0; i < newItem.length; i++) {
    let element = newItem[i];
    changeItem.push(element);
  }
  obj["words"] = changeItem.join(" ");
  return obj;
}

