"""Nititorn Nantasin 65003263019 CS65"""

import turtle

t = turtle.Turtle()
screen = turtle.Screen()
size_screen = (1152, 768)
y_size = size_screen[1] / 6
screen.setup(size_screen[0], size_screen[1])
startpos = [-(size_screen[0] / 2), size_screen[1] / 2]

screen.bgcolor("black")
t.speed(9)
t.color("white")
t.penup()
t.begin_fill()
t.goto(startpos[0],startpos[1])
t.pendown()
t.forward(size_screen[0])
t.right(90)
t.forward(size_screen[1])
t.right(90)
t.forward(size_screen[0])
t.right(90)
t.forward(size_screen[1])
t.end_fill()
t.goto(size_screen[0]/6,0)
t.color("red")
t.begin_fill()
t.circle(size_screen[0]/6)
t.end_fill()
t.hideturtle()
screen.mainloop()
