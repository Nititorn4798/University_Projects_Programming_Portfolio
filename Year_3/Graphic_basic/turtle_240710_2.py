import turtle

screen = turtle.Screen()
t = turtle.Turtle()

t.color('red')
t.shape('arrow')
t.speed('fastest')

while True:
    for i in range(0,4):
        t.pendown()
        t.width(2)
        t.fd(300)
        t.right(90)
        t.stamp()
        t.left(90)
        t.goto(0,0)
        t.right(90)
        t.penup()





screen.mainloop()
