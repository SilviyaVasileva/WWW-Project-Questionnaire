const startButton = document.getElementById("startBtn");
const nextButton = document.getElementById("nextBtn");
const prevButton = document.getElementById("prevBtn");
const finishButton = document.getElementById("finishBtn");
const questionContainer = document.getElementById("questionContainer");
const answersElements = document.getElementsByName("answ");
const questionElement = document.getElementById("question");

const showQuestions = (event) => {
  prevButton.classList.remove('hide');
  nextButton.classList.remove('hide');
  if (startIndex == currIndex) {
    prevButton.classList.add("hide");
  }
  if (endIndex - 1 == currIndex) {
    nextButton.classList.add("hide");
  }
  if (endIndex - 1 == currIndex) {
    finishButton.classList.remove("hide");
  }

  console.log("currIndex", currIndex);
  console.log("endIndex", endIndex);
  for (let ind = 0; ind < answersElements.length; ind++) {
    answersElements[ind].addEventListener("click", (event) => {
      window.sessionStorage.setItem(currIndex, ind + 1);
      const SelectedButton = event.target;
      SelectedButton.style.backgroundColor = "#90EE90";
      SelectedButton.style.color = "black";
      
      event.preventDefault();
    });
  }
};

finishButton.addEventListener('click',()=>{
  window.sessionStorage.clear();
})
showQuestions();
// const startButton = document.getElementById("startBtn");
// const nextButton = document.getElementById("nextBtn");
// const prevButton = document.getElementById("prevBtn");
// const questionContainer = document.getElementById("questionContainer");
// let currentQuestionIndex;
// const questionElement = document.getElementById("question");
// const answersElements = document.getElementById("answerBtns");
// console.log(jArray.length);
// //start the quiz
// startButton.addEventListener("click", startQuiz);

// //this is next button for next question if available
// nextButton.addEventListener("click", () => {
//   currentQuestionIndex += 4;
//   console.log(currentQuestionIndex);
//   setNextQuestion(currentQuestionIndex);
// });

// //prev btn for prev question if available
// prevButton.addEventListener("click", () => {
//   currentQuestionIndex -= 4;
//   console.log(currentQuestionIndex);
//   resetState();
//   showQuestion(currentQuestionIndex);
// });

// const resetState = () => {
//   nextButton.classList.add("hide");
//   prevButton.classList.add("hide");
//   while (answersElements.firstChild) {
//     answersElements.removeChild(answersElements.firstChild);
//   }
// };

// const selectAnswer = (event) => {
//   const SelectedButton = event.target;
//   SelectedButton.style.backgroundColor = "#90EE90";
//   SelectedButton.style.color = "black";
//   console.log(currentQuestionIndex);
//   if (jArray.length > currentQuestionIndex + 4) {
//     nextButton.classList.remove("hide");
//   }
//   if (currentQuestionIndex - 4 > -1) {
//     prevButton.classList.remove("hide");
//   }
// };

// const showQuestion = (questIndex) => {
//   questionElement.innerText = jArray[questIndex].questionDescription;
//   for (let ind = questIndex; ind < questIndex + 4; ind++) {
//     if (jArray[questIndex].questionId == jArray[ind].questionId) {
//       const button = document.createElement("button");
//       button.innerText = jArray[ind].answerDescription;
//       button.value=jArray[ind].id;
//       button.name="answer";
//       button.classList.add("btn");
//       button.addEventListener("click", selectAnswer);
//       answersElements.appendChild(button);
//     }
//   }
// };

// const setNextQuestion = () => {
//   resetState();
//   showQuestion(currentQuestionIndex);
// };

// function startQuiz() {
//   startButton.classList.add("hide");
//   questionContainer.classList.remove("hide");
//   currentQuestionIndex = 0;
//   setNextQuestion();
// }
