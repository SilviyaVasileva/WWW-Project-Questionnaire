const startButton = document.getElementById("start-btn");
const nextButton = document.getElementById("next-btn");
const questionContainer = document.getElementById("question-container");
let shuffleQuestions, currentQuestionIndex;
const questionElement = document.getElementById("question");
const answersElements = document.getElementById("answer-btns");
startButton.addEventListener("click", startQuiz);
nextButton.addEventListener("click", () => {
  currentQuestionIndex++;
  setNextQuestion();
});

const resetState = () => {
  nextButton.classList.add("hide");
  while (answersElements.firstChild) {
    answersElements.removeChild(answersElements.firstChild);
  }
};

const clearStatusClass = (element) => {
  element.classList.remove("correct");
  element.classList.remove("wrong");
};

const setStatusClass = (element, status) => {
  clearStatusClass(element);
  if (status) {
    element.classList.add("correct");
  } else {
    element.classList.add("wrong");
  }
};

const selectAnswer = (event) => {
  const SelectedButton = event.target;
  const correct = SelectedButton.dataset.correct;
  setStatusClass(document.body, correct);
  Array.from(answersElements.children).forEach((child) => {
    setStatusClass(child, child.dataset.correct);
  });
  if (shuffleQuestions.length > currentQuestionIndex + 1) {
    nextButton.classList.remove("hide");
  }
  
};

const showQuestion = (question) => {
  questionElement.innerText = question.question;
  question.answers.forEach((answer) => {
    const button = document.createElement("button");
    button.innerText = answer.text;
    button.classList.add("btn");
    if (answer.correct) {
      button.dataset.correct = answer.correct;
    }
    button.addEventListener("click", selectAnswer);
    answersElements.appendChild(button);
  });
};

const setNextQuestion = () => {
  resetState();
  showQuestion(shuffleQuestions[currentQuestionIndex]);
};

function startQuiz() {
  startButton.classList.add("hide");
  questionContainer.classList.remove("hide");
  shuffleQuestions = questions.sort(() => Math.random - 0.5);
  currentQuestionIndex = 0;
  setNextQuestion();
}

const questions = [
  {
    question: "question 2+2",
    answers: [
      { text: "4", correct: true },
      { text: "6", correct: false },
    ],
  },
  {
    question: "n 5+2",
    answers: [
      { text: "7", correct: true },
      { text: "1", correct: false },
    ],
  },
];
