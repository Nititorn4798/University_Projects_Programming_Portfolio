class A:
    def __init__(self,x) -> None:
        self.x = x
    def __add__(self,o):
        return self.x + o.x

m = A(5)
n = A(10)
print('plus = ',A.__add__(m,n))
r = A('Hello. ')
s = A('Ice Cream')
print('How are you? ',A.__add__(r,s))
t = A(2.5)
u = A(3.75)
print('grade = ',A.__add__(t,u))
