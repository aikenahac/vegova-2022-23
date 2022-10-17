class Lik {
  ploscina() {}
}

class Pravokotnik extends Lik {
  constructor(a, b) {
    this.a = a;
    this.b = b;
  }

  set a(newA) {
    if (newA) {
      this.a = newA;
    }
  }

  set b(newB) {
    if (newB) {
      this.b = newB;
    }
  }

  get a() {
    return this.a;
  }

  get b() {
    return this.b;
  }

  ploscina() {
    return this.a * this.b;
  }
}

class Krog extends Lik {
  constructor(r) {
    this.r = r;
  }

  set r(newR) {
    if (newR) {
      this.r = newR;
    }
  }

  get r() {
    return this.r;
  }

  ploscina() {
    return Math.PI * (r * r);
  }
}
