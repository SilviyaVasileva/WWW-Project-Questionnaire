const startButton = document.getElementById("startBtn");
const nextButton = document.getElementById("nextBtn");
const prevButton = document.getElementById("prevBtn");
const finishButton = document.getElementById("finishBtn");
const buttons = [
  document.getElementById("btn1"),
  document.getElementById("btn2"),
  document.getElementById("btn3"),
  document.getElementById("btn4"),
];

//show and hide buttons for navigation for the given question
const showQuestions = (event) => {
  prevButton.classList.remove("hide");
  nextButton.classList.remove("hide");
  if (startIndex == currIndex) {
    prevButton.classList.add("hide");
  }
  if (endIndex - 1 == currIndex) {
    nextButton.classList.add("hide");
  }
  if (endIndex - 1 == currIndex) {
    finishButton.classList.remove("hide");
  }
};

showQuestions();

//change the background color and the hover for the selected answer
if (buttonInd > 0) {
  buttons[buttonInd - 1].classList.add("selected");
}
