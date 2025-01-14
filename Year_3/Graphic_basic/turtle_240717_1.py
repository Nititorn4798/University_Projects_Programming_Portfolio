"""Nititorn Nantasin 65003263019 CS65"""
import turtle

t = turtle.Turtle()
screen = turtle.Screen()

screen.bgcolor("#123466")

t.width(4)
t.speed(0)
t.color('white')
squ = 6
for i in range(squ):
    t.forward(30)
    t.right(360/squ)

screen.exitonclick()