import turtle

t = turtle.Turtle()
screen = turtle.Screen()

t.speed(0)

t.pencolor("Black")

t.penup()
t.forward(100)
t.left(90)
t.forward(100)
t.right(90)
t.left(138)

t.pendown()
t.begin_fill()
t.fillcolor("Black")
for i in range(35):

    t.forward(1)

    t.left(1)

t.right(5)

for i in range(35):

    t.forward(1)

    t.left(1)

t.right(5)

t.forward(30)


for i in range(15):

    t.forward(0.7)

    t.right(3)


t.forward(25)

t.left(5)

for i in range(50):

    t.forward(1)

    t.left(1)

t.right(3)

for i in range(50):

    t.forward(1)

    t.left(1)

t.right(5)

for i in range(45):

    t.forward(2)

    t.left(1)

t.right(5)

for i in range(40):

    t.forward(2)

    t.left(1)

t.right(5)

for i in range(20):

    t.forward(1)

    t.left(2)

t.left(5)

t.forward(25)

for i in range(8):

    t.forward(2)

    t.right(3)

t.forward(1)

for i in range(5):

    t.forward(2)

    t.right(1)

t.right(4)

t.forward(4.5)

t.right(2)

for i in range(25):

    t.forward(1)

    t.left(2)

t.left(8)

t.forward(10)

for i in range(35):

    t.forward(2)

    t.left(1)

t.right(3)

t.forward(10)

t.left(83)

for i in range(77):

    t.forward(1)

    t.right(1)

t.right(10)

for i in range(30):

    t.forward(1)

    t.right(1)

t.forward(12)

t.left(73.11)


for i in range(10):

    t.forward(2)

    t.left(2.33)

t.end_fill()
t.penup()

t.color("black")
t.home()
t.goto(0, 123.65003263019)
t.pendown()
t.begin_fill()
t.circle(60, 90)
t.left(90)
t.circle(60, 90)
t.end_fill()
t.penup()
t.hideturtle()

turtle.done()


screen.mainloop()
