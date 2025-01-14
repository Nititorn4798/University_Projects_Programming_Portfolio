"""Nititorn Nantasin 65003263019 CS65"""
import turtle

t = turtle.Turtle()
screen = turtle.Screen()

startpos = [-110, 0]
color_set = ["#0085C7", "#F4C300", "#000000", "#009F3D", "#DF0024"]

t.width(6)
t.shape("circle")


def justdraw(color_get: str, pos: list, circle_size=50):
    """just draw a circle"""
    print(f"019@CS65 : Draw a {color_get} circle , at X {pos[0]} , Y {pos[1]}")
    t.color(color_get)
    t.penup()
    t.goto(pos[0], pos[1])
    t.pendown()
    t.circle(circle_size)

try:
    for i, color in enumerate(color_set):
        justdraw(color, startpos)
        startpos[0] = startpos[0] + 55
        if i % 2 == 0:
            startpos[1] = startpos[1] - 70
        else:
            startpos[1] = startpos[1] + 70
    t.penup()
    t.home()
    t.hideturtle()
except SyntaxError:
    print("An Error Occurred, Please Try Again.")

screen.mainloop()
