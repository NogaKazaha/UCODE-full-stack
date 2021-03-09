function concat(string1, string2) {
  func1.count = 0;
  function func1() {
    func1.count++;
    let string2 = prompt('Enter second string!');
    if (string2.length < 1) {
      return string1
    }
    return string1 + ' ' + string2;
  };
  if (string2 === undefined) {
    return func1;
  } 
  else {
    return string1 + ' ' + string2;
  }
}
