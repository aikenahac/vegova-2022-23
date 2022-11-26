const form = document.forms["bmiForm"];

const table = document.getElementById("bmiData");

const addData = () => {
  const newRow = document.createElement("tr");

  console.log(calculateBmi(form["weight"].value, form["height"].value));

  const height = form["height"].value;
  const weight = form["weight"].value;
  const bmi = calculateBmi(weight, height);

  const heightCell = document.createElement("td");
  const heightCellContent = document.createTextNode(`${height}cm`);
  heightCell.appendChild(heightCellContent);

  const weightCell = document.createElement("td");
  const weightCellContent = document.createTextNode(`${weight}kg`);
  weightCell.appendChild(weightCellContent);

  const bmiCell = document.createElement("td");
  const bmiCellContent = document.createTextNode(bmi);
  bmiCell.appendChild(bmiCellContent);

  let bmiStatus;
  let color;

  if (bmi <= 18.5) {
    bmiStatus = "Underweight";
    color = "red";
  } else if (bmi > 18.5 && bmi <= 25) {
    bmiStatus = "Normal";
    color = "green";
  } else if (bmi > 25 && bmi <= 30) {
    bmiStatus = "Overweight";
    color = "yellow";
  } else if (bmi > 30) {
    bmiStatus = "Obese";
    color = "red";
  } else {
    bmiStatus = "Unkown";
    color = "blue";
  }

  const bmiStatusCell = document.createElement("td");
  const bmiStatusCellContent = document.createTextNode(bmiStatus);
  bmiStatusCell.appendChild(bmiStatusCellContent);

  newRow.style.backgroundColor = color;

  newRow.appendChild(heightCell);
  newRow.appendChild(weightCell);
  newRow.appendChild(bmiCell);
  newRow.appendChild(bmiStatusCell);

  table.appendChild(newRow);

  form.reset();
  return false;
};

form.onsubmit = addData;

// Weight is in kg
// Height is in cm - needs to be converted to m
function calculateBmi(weight, height) {
  height = height / 100;

  const bmi = weight / Math.pow(height, 2);

  return bmi;
}
