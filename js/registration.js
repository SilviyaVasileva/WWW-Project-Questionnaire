const isAlphaNumeric = (input) => new RegExp(/^[a-zA-Z0-9]+$/).test(input);

const hasCapitalLetter = (input) => new RegExp(/^.*[A-Z].*/).test(input);
const hasNumber = (input) => new RegExp(/^.*[0-9].*/).test(input);
const hasSmallLetter = (input) => new RegExp(/^.*[a-z].*/).test(input);

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

const onErrorMessage = (message) =>
  (document.getElementById("onError").innerHTML +=
    "<b>Error:</b> " + message + "<br/>");

const onSuccessMessage = () =>
  (document.getElementById("onSuccess").innerHTML +=
    "<b>Login successful!</b>");

const clearPreviousErrors = () => {
  document.getElementById("onError").innerHTML = "";
  document.getElementById("onSuccess").innerHTML = "";
};

const fieldLength = (input, nameOfInput, minLength, maxLength) => {
  if (input.length < minLength || input.length > maxLength) {
    const value = nameOfInput.charAt(0).toUpperCase() + nameOfInput.slice(1);
    onErrorMessage(
      `${value} should be between ${minLength} and ${maxLength} symbols long!`
    );
  }
};

const fieldNameLength = (input) => {
  input.length > 50 &&
    onErrorMessage(
      `First and last name field should be maximum 50 symbols long!`
    );
};

const validate = async (event) => {
  event.preventDefault();
  clearPreviousErrors();

  const fields = {
    username: document.getElementById("username").value || "",
    email: document.getElementById("email").value || "",
    password: document.getElementById("password").value || "",
    confirmPassword: document.getElementById("confirm-password").value || "",
  };

  const { username, email, password, confirmPassword } = fields;

  fieldLength(username, "username", 3, 10);

  fieldLength(password, "password", 6, 10);
  !passwordValidation(password) &&
    onErrorMessage(
      "Password should have at least one small letter, one capital letter and one number!"
    );

  if (password !== confirmPassword) {
    onErrorMessage("Confirm password isn't the same as password!");
  }
  !emailValidation(email) && onErrorMessage("Invalid email!");

  document.getElementById("onError").innerHTML === "" && onSuccessMessage();
};
