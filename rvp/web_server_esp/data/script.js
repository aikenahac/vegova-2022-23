const led5Switch = document.getElementById("led5Switch");
const led12Switch = document.getElementById("led12Switch");


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

async function getTemp() {
  const resp = await fetch('/temp');

  console.log(resp);
}

function toggle(ledPin, state) {
  fetch(`/${ledPin}/${state}`, {
    method: 'POST',
  });
}

setInterval(() => {
  getTemp();
}, 5000);