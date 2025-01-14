import turtle

t = turtle.Turtle()
screen = turtle.Screen()
size_screen = (1152, 768)
screen.setup(size_screen[0], size_screen[1])
screen.bgcolor("white")
t.speed(0)
t.width(2)

def show_center():
    t.color("red")
    t.circle(1)


t.color("black")

def ez_circle(size:int,pos: tuple=None):
    temp_pos = t.position()
    if pos:
        t.goto(pos)
    t.penup()
    t.left(90)
    t.backward(size)
    t.right(90)
    t.pendown()
    t.circle(size)
    t.penup()
    t.goto(temp_pos)

ez_circle(150)
ez_circle(100)
ez_circle(50)
ez_circle(20)

screen.mainloop()