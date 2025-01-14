import turtle

t = turtle.Turtle()
screen = turtle.Screen()
size_screen = (1152, 768)
screen.setup(size_screen[0], size_screen[1])

scale = 1

t.penup()
t.goto(0, size_screen[1]/4)
t.speed(6)

t.pendown()
t.color("black")
t.begin_fill()
t.circle(scale*120,90)
t.left(90)
t.circle(scale*120,90)
t.end_fill()

t.penup()
t.goto(150, size_screen[1]/5)


t.right(138)
t.pendown()
for i in range(75):
    t.forward(1)
    t.left(1)
t.forward(50)

for i in range(50):
    t.forward(1)
    t.right(1)
t.forward(50)

for i in range(75):
    t.forward(1)
    t.left(1)

for i in range(75):
    t.forward(3)
    t.left(1)

screen.mainloop()