console.log(questionnarie_arr);
console.log(quiz_arr);

const quizPlace = document.getElementById("quiz");
const questionnariePlace = document.getElementById("questionnarie");

const makeGridQuestionnarie = (rows, cols) => {
  questionnariePlace.style.setProperty("--grid--rows", rows);
  questionnariePlace.style.setProperty("--grid-cols", cols);
  for (
    pos = 0, ind = 0;
    pos < rows * cols, ind < questionnarie_arr.length;
    pos++, ind++
  ) {
    let cell = document.createElement("button");
    cell.value = questionnarie_arr[ind].id;
    cell.name = "test_id";
    cell.innerText = questionnarie_arr[ind].test_name;
    questionnariePlace.appendChild(cell).className = "grid-item";
  }
};

const makeGridQuiz = (rows, cols) => {
  quizPlace.style.setProperty("--grid--rows", rows);
  quizPlace.style.setProperty("--grid-cols", cols);
  for (
    pos = 0, ind = 0;
    pos < rows * cols, ind < quiz_arr.length;
    pos++, ind++
  ) {
    let cell = document.createElement("button");
    cell.value = quiz_arr[ind].id;
    cell.name = "test_id";
    cell.innerText = quiz_arr[ind].test_name;
    quizPlace.appendChild(cell).className = "grid-item";
  }
};

makeGridQuestionnarie(3, 4);
makeGridQuiz(3, 4);