const startButton = document.getElementById("start-btn");
const nextButton = document.getElementById("next-btn");
const prevButton = document.getElementById("prev-btn");
const questionContainer = document.getElementById("question-container");
let currentQuestionIndex;
const questionElement = document.getElementById("question");
const answersElements = document.getElementById("answer-btns");
console.log(jArray.length);
//start the quiz
startButton.addEventListener("click", startQuiz);

//this is next button for next question if available
nextButton.addEventListener("click", () => {
  currentQuestionIndex += 4;
  console.log(currentQuestionIndex);
  setNextQuestion(currentQuestionIndex);
});

//prev btn for prev question if available
prevButton.addEventListener("click", () => {
  currentQuestionIndex -= 4;
  console.log(currentQuestionIndex);
  resetState();
  showQuestion(currentQuestionIndex);
});

const resetState = () => {
  nextButton.classList.add("hide");
  prevButton.classList.add("hide");
  while (answersElements.firstChild) {
    answersElements.removeChild(answersElements.firstChild);
  }
};

const selectAnswer = (event) => {
  const SelectedButton = event.target;
  SelectedButton.style.backgroundColor = "#90EE90";
  SelectedButton.style.color = "black";
  console.log(currentQuestionIndex);
  if (jArray.length > currentQuestionIndex + 4) {
    nextButton.classList.remove("hide");
  }
  if (currentQuestionIndex - 4 > -1) {
    prevButton.classList.remove("hide");
  }
};

const showQuestion = (questIndex) => {
  questionElement.innerText = jArray[questIndex].questionDescription;
  for (let ind = questIndex; ind < questIndex + 4; ind++) {
    if (jArray[questIndex].questionId == jArray[ind].questionId) {
      const button = document.createElement("button");
      button.innerText = jArray[ind].answerDescription;
      button.value=jArray[ind].id;
      button.name="answer";
      button.classList.add("btn");
      button.addEventListener("click", selectAnswer);
      answersElements.appendChild(button);
    }
  }
};

const setNextQuestion = () => {
  resetState();
  showQuestion(currentQuestionIndex);
};

function startQuiz() {
  startButton.classList.add("hide");
  questionContainer.classList.remove("hide");
  currentQuestionIndex = 0;
  setNextQuestion();
}
