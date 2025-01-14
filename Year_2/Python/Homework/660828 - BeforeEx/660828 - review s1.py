
# #? Variable Rule
# #Legal variable names:
# myvar = "John"
# my_var = "John"
# _my_var = "John"
# myVar = "John"
# MYVAR = "John"
# myvar2 = "John"

# #Illegal variable names:
# 2myvar = "John"
# my-var = "John"
# my var = "John"

x = 100.0
y = 3
num1 = num2 = 100
a, b = 100, 200
a, b = b, a
print(a, b, num1)
print(a+b)
print(a-b)
print(a*b)
print(a/b)
print(a**b)
print(a//b)
print(a%b)

# !PEMDAS-ลำดับการทำงานของเครื่องหมายทางคณิตศาสตร์ + L>>R
# ()
# **
# * / // %
# + -

print(type(x))
import sys
print('Size of : ',sys.getsizeof(x))

print(int("123"))
print(float(10))
print(str(123))
tc = str(a)
print('a+b : ',a+b)
# 9 / 3 = 3.0 i/i=f
# round(2.51) = 3
# round(2.5) = 2

#! Input
varip = input('Text')
# type(varip) = <class 'str'> '1' 'abc'
print('input is' + varip)
varip = int(input('Text'))
# type(varip) = <class 'int'> 1 120
print(3019 + varip)
