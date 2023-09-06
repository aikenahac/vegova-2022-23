const temperature = document.getElementById("temp");
const humidity = document.getElementById("hum");
const heater = document.getElementById("heater-state-icon");
const dehumidifier = document.getElementById("dehumidifier-state-icon");

function toFloat(num) {
  return (+num).toFixed(2);
}

async function getTemp() {
  console.log("getting temperature");
  const resp = await fetch("/heater");
  const data = await resp.text();

  temperature.innerHTML = `${toFloat(data)} °C`;
}

async function getHum() {
  console.log("getting humidifier");
  const resp = await fetch("/humidifier");
  const data = await resp.text();

  humidity.innerHTML = `${toFloat(data)}%`;
}

function toggle(device, state) {
  fetch(`/${device}/${state}`, {
    method: "POST",
  });
}

setInterval(() => {
  console.log("requesting data");
  getTemp();
  getHum();
}, 1000);
