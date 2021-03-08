function total(addCount, addPrice, currentTotal = 0) {
  let result = (addCount * addPrice) + currentTotal;
  return +result.toFixed(2);
}
