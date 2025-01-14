"""Nititorn Nantasin 65003263019 CS65"""

import turtle

t = turtle.Turtle()
screen = turtle.Screen()
size_screen = (1152, 768)
y_size = size_screen[1] / 6
screen.setup(size_screen[0], size_screen[1])
startpos = [-(size_screen[0] / 2), size_screen[1] / 2]
color_set = ["#A51931", "#F4F5F8", "#2D2A4A"]
flag = {
    0: {"colorx": 0, "sizex": 1},
    1: {"colorx": 1, "sizex": 1},
    2: {"colorx": 2, "sizex": 2},
    3: {"colorx": 1, "sizex": 1},
    4: {"colorx": 0, "sizex": 1},
}

t.penup()
t.width(1)
t.speed(9.65003263019)
t.goto(startpos[0], startpos[1])

def justdraw(color_get: int, size: int):
    """just draw a square"""
    t.pendown()
    t.begin_fill()
    t.color(color_set[color_get])
    t.forward(size_screen[0])
    t.right(90)
    t.forward(y_size * size)
    t.right(90)
    t.forward(size_screen[0])
    t.right(90)
    t.forward(y_size * size)
    t.end_fill()
    t.penup()
    startpos[1] -= y_size * size
    t.right(90)
    t.goto(startpos[0], startpos[1])
try:
    for key, value in flag.items():
        print(f"019@CS65 : ({key}) draw {color_set[value['colorx']]} rectangle size ({size_screen[0]}x{y_size*value['sizex']}) at {startpos}")
        justdraw(value["colorx"], value["sizex"])
except SyntaxError:
    print("An Error Occurred, Please Try Again.")

screen.mainloop()
