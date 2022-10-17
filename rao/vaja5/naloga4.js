class Car {
  constructor(owner, hp, price, color) {
    this.owner = owner;
    this.hp = hp;
    this.price = price;
    this.color = color;
  }

  hpPerPrice() {
    return this.hp / this.price;
  }
}

function compareCars(cars) {
  let best = cars[0];

  cars.forEach((car) => {
    if (car.hpPerPrice() < best.hpPerPrice()) {
      best = car;
    }
  });

  console.log(best);
}

const cars = [
  new Car("Baiken Bine Bahac", 250, 250000, "black"),
  new Car("Bašper Bobrovoljc", 120, 15000, "green"),
  new Car("Baia Blara Bihalinec", 200, 100000, "red"),
  new Car("Bim Brovat", 170, 70000, "blue"),
  new Car("Banez Banša", 100, 10000, "not black"),
];

compareCars(cars);
