const startButton=document.getElementById('start-btn')
const nextButton=document.getElementById('next-btn')
const questionContainer=document.getElementById('question-container')
let shuffleQuestions, currentQuestionIndex;
const questionElement = document.getElementById('question')
const aswersElements = document.getElementById('answer-btns')
startButton.addEventListener('click',startQuiz);

const resetState = () => {
    nextButton.classList.add('hide');
    while(aswersElements.firstChild){
        aswersElements.removeChild(aswersElements.firstChild)
    }
}

const selectAnswer = event => {
    

}

const showQuestion = question => {
    questionElement.innerText = question.question;
    question.answers.forEach(answer => {
        const button=document.createElement('button');
        button.innerText=answer.text;
        button.classList.add('btn');
        if(answer.correct){
            button.dataset.correct=answer.correct;
        }
        button.addEventListener('click',selectAnswer);
        aswersElements.appendChild(button);
    });
}

const setNextQuestion = () => {
    resetState();
    showQuestion (shuffleQuestions[currentQuestionIndex]);
}

function startQuiz() {
    console.log('str');
    startButton.classList.add('hide');
    questionContainer.classList.remove('hide')
    shuffleQuestions = questions.sort(() => Math.random - 0.5);
    currentQuestionIndex = 0;
    setNextQuestion();
}

const questions = [
    {
    question: 'question 2+2',
    answers: [
        { text: '4', correct:true},
        { text: '6', correct:false},
    ]
}
]
