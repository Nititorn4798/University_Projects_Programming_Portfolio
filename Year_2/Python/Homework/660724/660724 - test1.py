def helloworldnaja () :
    print('Hello World')
    
def trianglearea (base, height) :
    area = 0.5 * float(base) * float(height)
    return area

def inputvalue() :
    try:
        x, y = (input("Enter two values: ").split())
        print(trianglearea(x,y))
    except:
        print('ค่าที่ให้มา Error นะจ๊ะ')

helloworldnaja()
print(trianglearea(10,20))

while True:
    inputvalue()