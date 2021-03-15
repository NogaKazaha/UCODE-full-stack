function addAttributes() {
  let elem_arr = document.getElementsByTagName("li");
  for (let i = 0; i < elem_arr.length; i++) {
    let cur_arr = elem_arr[i];
    if (cur_arr.hasAttributes() === false || (cur_arr.getAttribute("class") !== "good" && cur_arr.getAttribute("class") !== "evil" && cur_arr.getAttribute("class") !== "unknown")) {
      cur_arr.setAttribute("class", "unknown");
    }
    let attributes = cur_arr.attributes;
    if (!attributes["data-element"]) {
      cur_arr.setAttribute("data-element", "none");
    }
    let data_element = cur_arr.getAttribute("data-element").split(" ");
    let add_br = document.createElement("br");
    cur_arr.appendChild(add_br);
    let circle_class;
    function addCircles() {
      let divCircle = document.createElement("div");
      circle_class = document.createAttribute("class");
      cur_arr.appendChild(divCircle);
      divCircle.setAttributeNode(circle_class);
      circle_class.value = "elem";
      if (data_element.includes("none")) {
        let div_line = document.createElement("div");
        let line_class = document.createAttribute("class");
        div_line.setAttributeNode(line_class);
        divCircle.appendChild(div_line);
        line_class.value = "line";
      }
    }
    for (let j = 0; j < data_element.length; j++) {
      addCircles();
      circle_class.value += " " + data_element[j];
    }
  }
}
addAttributes();