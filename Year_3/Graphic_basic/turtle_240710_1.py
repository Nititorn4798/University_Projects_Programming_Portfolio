import turtle

screen = turtle.Screen()
t = turtle.Turtle()

t.color('red')
t.shape('arrow')
while True:
    for i in range (1,4):
        t.fd(90)
        t.right(90)
    t.fd(99)



screen.mainloop()
