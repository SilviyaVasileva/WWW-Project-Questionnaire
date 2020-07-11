const quizPlace = document.getElementById("quiz");
const questionnariePlace = document.getElementById("questionnarie");

//make a grid for the questionnarie
const makeGridQuestionnarie = (rows, cols) => {
  //make the rows
  questionnariePlace.style.setProperty("--grid--rows", rows);
  //make the columns
  questionnariePlace.style.setProperty("--grid-cols", cols);
  for (
    pos = 0, ind = 0;
    pos < rows * cols, ind < questionnarie_arr.length;
    pos++, ind++
  ) {
    let cell = document.createElement("button");
    cell.value = questionnarie_arr[ind].id;
    //set the name of the cell to testId so that we can get it in the php part
    cell.name = "testId";
    cell.innerText = questionnarie_arr[ind].testName;
    questionnariePlace.appendChild(cell).className = "grid-item";
  }
};

//make a grid for the questionnarie
const makeGridQuiz = (rows, cols) => {
  //make the rows
  quizPlace.style.setProperty("--grid--rows", rows);
  //make the columns
  quizPlace.style.setProperty("--grid-cols", cols);
  for (
    pos = 0, ind = 0;
    pos < rows * cols, ind < quiz_arr.length;
    pos++, ind++
  ) {
    let cell = document.createElement("button");
    cell.value = quiz_arr[ind].id;
    //set the name of the cell to testId so that we can get it in the php part
    cell.name = "testId";
    cell.innerText = quiz_arr[ind].testName;
    quizPlace.appendChild(cell).className = "grid-item";
  }
};

makeGridQuestionnarie(3, 10);
makeGridQuiz(3, 10);
