"""Nititorn Nantasin 65003263019 CS65"""

import turtle

t = turtle.Turtle()
screen = turtle.Screen()
size_screen = (1152, 768)
y_size = size_screen[1] / 6
screen.setup(size_screen[0], size_screen[1])
screen.bgcolor("gray")
size_offset = 2.65003263019
t.speed(0)
y_offset = -165.003263019
t.penup()
t.goto(0,0*size_offset+y_offset)
t.color("#9F1300")
t.begin_fill()
t.pendown()
t.circle(100*size_offset)
t.end_fill()
t.penup()

t.goto(0,15*size_offset+y_offset)
t.color("white")
t.begin_fill()
t.pendown()
t.circle(85*size_offset)
t.end_fill()
t.penup()

t.goto(0,30*size_offset+y_offset)
t.color("#9F1300")
t.begin_fill()
t.pendown()
t.circle(70*size_offset)
t.end_fill()
t.penup()

t.goto(0,45*size_offset+y_offset)
t.color("#021A9C")
t.begin_fill()
t.pendown()
t.circle(55*size_offset)
t.end_fill()
t.penup()

t.color("white")
t.home()
t.goto(0,108*size_offset+y_offset)
t.pendown()
t.left(45)
t.forward(23.3*size_offset)
t.begin_fill()
offset_x = 35.5*size_offset

t.right(55)

for i in range (5):
    for i in range(3):
        t.forward(offset_x)
        t.right(120)
    t.left(120)
    t.backward(offset_x)
    t.right(72.5)
    t.right(120)
t.end_fill()

screen.mainloop()