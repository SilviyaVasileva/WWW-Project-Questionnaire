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
if (buttonInd > 0) {
  buttons[buttonInd - 1].classList.add("selected");
}
// console.log("currIndex", currIndex);
// console.log("endIndex", endIndex);
// for (let ind = 0; ind < answersElements.length; ind++) {
//   answersElements[ind].addEventListener("click", (event) => {
//     window.sessionStorage.setItem(currIndex, ind + 1);
//     // console.log(window.sessionStorage.getItem(0));

//     const SelectedButton = event.target;
//     SelectedButton.style.backgroundColor = "#90EE90";
//     SelectedButton.style.color = "black";

//     event.preventDefault();
//   });
// }

// buttonOne.addEventListener("click", () => {
//     console.log("clicked1");
//     buttonOne.classList.add("selected");
//     buttonTwo.classList.remove("selected");
//     buttonThree.classList.remove("selected");
//     buttonFour.classList.remove("selected");
// });
// buttonTwo.addEventListener("click", () => {
//     console.log("clicked2");
//     buttonOne.classList.remove("selected");
//     buttonTwo.classList.add("selected");
//     buttonThree.classList.remove("selected");
//     buttonFour.classList.remove("selected");
// });
// buttonThree.addEventListener("click", () => {
//     console.log("clicked3");
//     buttonOne.classList.remove("selected");
//     buttonTwo.classList.remove("selected");
//     buttonThree.classList.add("selected");
//     buttonFour.classList.remove("selected");
// });
// buttonFour.addEventListener("click", () => {
//     console.log("clicked4");
//     buttonOne.classList.remove("selected");
//     buttonTwo.classList.remove("selected");
//     buttonThree.classList.add("selected");
//     buttonFour.classList.remove("selected");
// });
//   console.log("inside");
//   for (ind = 1; ind <= buttonInd; ind++) {

//     if (ind == buttonInd) {
//       buttonOne.classList.remove("selected");
//       buttonTwo.classList.add("selected");
//       buttonThree.classList.remove("selected");
//       buttonFour.classList.remove("selected");
//     }
//     else if (ind == buttonInd) {
//       buttonOne.classList.remove("selected");
//       buttonTwo.classList.remove("selected");
//       buttonThree.classList.add("selected");
//       buttonFour.classList.remove("selected");

//     }
//     else if (ind == buttonInd) {
//       buttonOne.classList.remove("selected");
//       buttonTwo.classList.remove("selected");
//       buttonThree.classList.remove("selected");
//       buttonFour.classList.add("selected");
//     }
// }

// var storedArray = JSON.parse(sessionStorage.getItem('items'));
// function passVal(){
//   var data = {
//     q-num: 0,
//     a-num: 1
//   };
//   $.post("../php/get-test.php", data);//storedArray);
// }
// finishButton.addEventListener('click',passVal);
// finishButton.addEventListener('click',()=>{
//   window.sessionStorage.clear();
// })
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
