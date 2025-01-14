def divnum (x,y=None):
    if (y == None):
        y = 1
        print('y is none')
    if (y==0):
        return 1

    return (x/y)

ans1 = divnum(50)
print(ans1)