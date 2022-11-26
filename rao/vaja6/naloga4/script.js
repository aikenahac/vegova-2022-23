const form = document.forms["loginForm"];

const loginValidation = () => {
  const username = form["username"].value;
  const password = form["password"].value;

  if (username === "aiken" && password === "aiken") {
    form.style.display = "none";
    document.body.style.backgroundColor = "green";
  } else {
    alert("Incorrect login info.");
  }

  return false;
};

form.onsubmit = loginValidation;
