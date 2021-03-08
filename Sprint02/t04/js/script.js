checkDivision(
  Number(prompt("Enter begin of range")),
  Number(prompt("Enter end of range"))
);

function checkDivision(beginRange, endRange) {
  if (beginRange === "" || endRange === "" || beginRange >= endRange) {
    beginRange = 1;
    endRange = 100;
    alert("The default range is from 1 to 100");
  } 
  for (let i = beginRange; i <= endRange; i++) {
    let result = i;
    if ((i % 2) === 0) {
      result = result + " is even";
    }
    if ((i % 3) === 0) {
      result = result + " is a multiple of 3";
    }
    if ((i % 10) === 0) {
      result = result + " is a multiple of 10";
    }
    if ((i % 3) === 0 && (i % 2) === 0) {
      result = i + " is even, a multiple of 3";
    }
    if ((i % 3) === 0 && (i % 10) === 0) {
      result = i + "a multiple of 3, a multiple of 10";
    }
    if ((i % 2) === 0 && (i % 10) === 0) {
      result = i + " is even, a multiple of 10";
    }
    if ((i % 3) === 0 && (i % 2) === 0 && (i % 10) === 0) {
      result = i + " is even, a multiple of 3, a multiple of 10";
    }
    console.log(String(result));
  }
}
