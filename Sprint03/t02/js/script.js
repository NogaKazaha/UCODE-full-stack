class Timer {
  constructor(title, delay, stopCount) {
    this.title = title,
    this.delay = delay, 
    this.stopCount = stopCount;
  }
  start() {
    let counter = this.stopCount;
    console.log(
      `Timer ${this.title} started (delay=${this.delay}, stopCount=${this.stopCount})`
    );
    let timerId = setInterval(() => {
      counter--;
      this.tick(this.title, counter);
    }, this.delay);
    this.stop(timerId);
  }
  tick(title, countdown) {
    console.log(`Timer ${title} Tick! | cycles left ${countdown}`);
  }
  stop(timerId) {
    setTimeout(() => {
      clearInterval(timerId);
      console.log(`Timer ${this.title} stopped`);
    }, this.stopCount * 1000);
  }
}

function runTimer(id, delay, counter) {
  return new Timer(id, delay, counter).start();
}

runTimer("Bleep", 1000, 5);