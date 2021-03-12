function* generator() {
  this.num = 1;
  while(true) {
    let input = prompt(`Previous result: ${this.num}. Enter a new number:`);
    if (Number(input) > 10000) {
      this.num = 1;
    } 
    else if (isNaN(input) || input === null) {
      yield error = 'Invalid number!';
    } 
    this.num += Number(input);
  }
}

const gen = generator();
console.error(gen.next().value);
