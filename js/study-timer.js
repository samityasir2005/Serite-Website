const startButton = document.getElementById("start-button");
const timerElement = document.getElementById("timer");
const hours = document.getElementById("hours");
const minutes = document.getElementById("minutes");
const seconds = document.getElementById("seconds");
const label = document.getElementById("label");
let timer;

startButton.addEventListener("click", startTimer);

function startTimer() {
  startButton.disabled = true;

  let totalSeconds = 1500;
  timer = setInterval(() => {
    totalSeconds--;
    hours.textContent = pad(Math.floor(totalSeconds / 3600));
    minutes.textContent = pad(Math.floor((totalSeconds % 3600) / 60));
    seconds.textContent = pad(totalSeconds % 60);

    if (totalSeconds === 0) {
      clearInterval(timer);
      timerElement.classList.add("yellow");
      label.innerHTML = "Break";
      totalSeconds = 300;
      timer = setInterval(() => {
        totalSeconds--;
        hours.textContent = pad(Math.floor(totalSeconds / 3600));
        minutes.textContent = pad(Math.floor((totalSeconds % 3600) / 60));
        seconds.textContent = pad(totalSeconds % 60);
        if (totalSeconds === 0) {
          clearInterval(timer);
          label.innerHTML = "Study";
          timerElement.classList.remove("yellow");
          startTimer();
        }
      }, 1000);
    }
  }, 1000);
}

function pad(number) {
  return number < 10 ? "0" + number : number;
}
