function sortEvenOdd(x) {
  function sorting(a, b){
    return a%2 - b%2 || a - b;
  }
  x.sort(sorting);
}