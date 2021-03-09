function checkBrackets(str) {
  let stck = [];
  if (!(typeof str === "string") || !str.match(/[()]/)) {
    return -1;
  } 
  else {
    for (let i = 0; i <= str.length; i++) {
      if (str[i] == "(") {
        stck.push("(");
      }
      if (str[i] == ")") {
        stck.push(")");
      }
    }
    stck = stck.join("");
    for (let i = 0; i <= str.length; i++) {
      stck = stck.replace(/\(\)/, "");
    }
  }
  return stck.length;
}

