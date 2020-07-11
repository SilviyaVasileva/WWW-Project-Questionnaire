//the regexp for the validation
const isAlphaNumeric = (input) => new RegExp(/^[a-zA-Z0-9]+$/).test(input);
const hasCapitalLetter = (input) => new RegExp(/^.*[A-Z].*/).test(input);
const hasNumber = (input) => new RegExp(/^.*[0-9].*/).test(input);
const hasSmallLetter = (input) => new RegExp(/^.*[a-z].*/).test(input);

//validations
const emailValidation = (input) =>
  new RegExp(/^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9-]{2,5})+\.[a-zA-Z0-9-.]{1,4}/).test(
    input
  );

const zipCodeValidation = (input) =>
  new RegExp(/[0-9]{5}-[0-9]{4}/).test(input);

const passwordValidation = (input) =>
  isAlphaNumeric(input) &&
  hasCapitalLetter(input) &&
  hasNumber(input) &&
  hasSmallLetter(input);

//msg for the errors
const onErrorMessage = (message) =>
  (document.getElementById("onError").innerHTML +=
    "<b>Грешка:</b> " + message + "<br/>");

//clear the msg so that the user can start again
const clearPreviousErrors = () => {
  document.getElementById("onError").innerHTML = "";
};

const fieldLength = (input, nameOfInput, minLength, maxLength) => {
  if (input.length < minLength || input.length > maxLength) {
    const value = nameOfInput.charAt(0).toUpperCase() + nameOfInput.slice(1);
    onErrorMessage(
      `${value} трябва да е с дължина между ${minLength} и ${maxLength}!`
    );
  }
};

const validate = async (event) => {
  clearPreviousErrors();

  const fields = {
    username: document.getElementById("username").value || "",
    email: document.getElementById("email").value || "",
    password: document.getElementById("password").value || "",
    confirmPassword: document.getElementById("confirmPassword").value || "",
  };

  const { username, email, password, confirmPassword } = fields;

  fieldLength(username, "Потребителско име", 3, 10);

  fieldLength(password, "Парола", 6, 10);
  !passwordValidation(password) &&
    onErrorMessage(
      "Паролата трябва да има минимум една главна, една малка и едно число!"
    );

  if (password !== confirmPassword) {
    onErrorMessage("Потвърдената парола не е същата като първоначалната!");
  }
  !emailValidation(email) && onErrorMessage("Неправилен email!");

  if(document.getElementById("onError").innerHTML === "") { return true; }

  else { event.preventDefault(); return false; }

};

const form = document.getElementById("registrationForm");
form.addEventListener("submit", validate);