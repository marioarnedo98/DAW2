let particles = []
let pcolor = '#ccc'
let particlesCoords = []
let particlesFinalCoords = []

const Particle = function (pos, trg) {
  this.pos = pos.copy()
  this.trg = trg.copy()
  this.velocity = createVector(0, 0)
  this.acc = createVector(0, 0)

  this.applyForce = function () {
    const mouse = createVector(mouseX, mouseY)
    this.acc = p5.Vector.sub(this.pos, mouse)
    this.acc.setMag(800 / this.acc.mag())
  }

  this.update = function () {
    this.velocity = p5.Vector.sub(this.trg, this.pos)
    this.velocity.add(this.acc)
    this.velocity.mult(.1)
    this.velocity.limit(10)
    this.pos.add(this.velocity)
  }

  this.render = function () {
    fill(pcolor)
    ellipse(this.pos.x, this.pos.y, 4)
  }
}


function setup () {
  createCanvas(windowWidth, windowHeight).parent(document.body)
  background(200)
  textFont('Tahoma', 100)
  noStroke()

  const str1 = 'Conor McGregor'
  text(str1, (width - textWidth(str1)) / 2, height / 2)
  textSize(200)

  for (let x = 0; x < width; x += 2.4) {
    for (let y = 0; y < height; y += 2.4) {
      const c = get(x, y)
      if (c[0] == 0) { 
        particlesCoords.push(createVector(x, y))
      }
    }
  }

  particlesFinalCoords = particlesCoords.slice()
}


function windowResized () {
  resizeCanvas(windowWidth, windowHeight)
}


function draw () {
  background(0)

  if (particles.length <= particlesCoords.length - 20) {
    for (let i = 0; i <= 20; i++) {
      let [w, h, r] = [width, height, random(4)]
      if (r < 1 || r >= 3) h = random(height)
      else w = random(width)

      const start = createVector(w, h)
      const t = random(particlesFinalCoords)
      particles.push(new Particle(start, t))
      particlesFinalCoords.splice(particlesFinalCoords.indexOf(t), 1)
    }
  }

  particles.forEach(e => {
    e.applyForce()
    e.update()
    e.render()
  })
}