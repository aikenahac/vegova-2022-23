const led5Switch = document.getElementById("led5Switch");
const led12Switch = document.getElementById("led12Switch");
const temperature = document.getElementById("temp");
const humidity = document.getElementById("hum");

led5Switch.addEventListener("change", defaultEventListener);

led12Switch.addEventListener("change",  defaultEventListener)

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
  const resp = await fetch('/temp');
  const data = await resp.text();

  temperature.innerHTML = `Temperature: ${toFloat(data)} C`;
  console.log(`Temperature: ${toFloat(data)} C`);
}

async function getHum() {
  const resp = await fetch('/hum');
  const data = await resp.text();

  humidity.innerHTML = `Humidity: ${toFloat(data)}%`;
  console.log(`Humidity: ${toFloat(data)}%`);
}

function toggle(ledPin, state) {
  fetch(`/${ledPin}/${state}`, {
    method: 'POST',
  });
}

setInterval(() => {
  getTemp();
  getHum();
}, 5000);