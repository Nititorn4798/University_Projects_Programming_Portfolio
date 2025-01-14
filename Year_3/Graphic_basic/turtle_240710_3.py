import turtle

screen = turtle.Screen()
t = turtle.Turtle()

t.color('red')
t.shape('arrow')
t.speed('fastest')


for i in range(0,360):
    t.penup()
    t.fd(15+(i/2))
    t.pendown()
    t.circle((i/2.94424)-i/2+i+i+i+2+i*1-(i*2))
    t.right(1)
    t.penup()
    t.goto(0,0)
    print(i)

screen.mainloop()
