const led5Switch = document.getElementById("led5Switch");
const led12Switch = document.getElementById("led12Switch");
const temperature = document.getElementById("temp");
const humidity = document.getElementById("hum");

led5Switch.addEventListener("change", defaultEventListener);

led12Switch.addEventListener("change", defaultEventListener);

function defaultEventListener(e) {
  console.log(e.target.name);
  if (e.target.checked) {
    toggle(e.target.name, "on");
  } else {
    toggle(e.target.name, "off");
  }
}

function toFloat(num) {
  return (+num).toFixed(2);
}

async function getTemp() {
  const resp = await fetch("/temp");
  const data = await resp.text();

  temperature.innerHTML = `Temperature: ${toFloat(data)} C`;
  console.log(`Temperature: ${toFloat(data)} C`);
}

async function getHum() {
  const resp = await fetch("/hum");
  const data = await resp.text();

  humidity.innerHTML = `Humidity: ${toFloat(data)}%`;
  console.log(`Humidity: ${toFloat(data)}%`);
}

async function checkState() {
  const resp5 = await fetch("/5/state");
  const resp5Text = await resp5.text();

  const resp12 = await fetch("/12/state");
  const resp12Text = await resp12.text();

  console.log(`Resp 5: ${resp5Text}, Resp 12: ${resp12Text}.`);

  if (resp5Text == 1) led5Switch.checked = true;
  else led5Switch.checked = false;

  if (resp12Text == 1) led12Switch.checked = true;
  else led12Switch.checked = false;
}

function toggle(ledPin, state) {
  fetch(`/${ledPin}/${state}`, {
    method: "POST",
  });
}

setInterval(() => {
  checkState();
  getTemp();
  getHum();
}, 5000);
