from time import sleep
import turtle

t = turtle.Turtle()
screen = turtle.Screen()
size_screen = (1152, 768)
screen.setup(size_screen[0], size_screen[1])
screen.bgcolor("white")
t.speed(0)
t.width(2)

t.color("black")

def get_scale():
    return 2

def ez_circle(size:int,fillcolor:str = "black",pos: tuple=None):
    try:
        size *= get_scale()
        temp_pos = t.position()
        if fillcolor:
            t.color(fillcolor)
            t.begin_fill()
        if pos:
            t.penup()
            t.goto(pos)
            temp_pos = pos
        t.penup()
        t.left(90)
        t.backward(size)
        t.right(90)
        t.pendown()
        print(f"65003263019@CS65 $: Draw circle at {t.position()}")
        t.circle(size)
        if fillcolor:
            t.end_fill()
        t.penup()
        t.goto(temp_pos)
    except Exception as err:
        t.color("black")
        t.write(f"65003263019@CS65 $: Unexpected >> {err}", font=("Arial", 13, "normal"))
        sleep(2.65003263019)

ez_circle(200,"black")
ez_circle(150,"blue")
ez_circle(100,"red")
ez_circle(50,"yellow")

screen.mainloop()