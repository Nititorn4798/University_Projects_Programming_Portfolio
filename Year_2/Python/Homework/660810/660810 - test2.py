def vat(*price) :
    print(type(price))
    for i in price:
        print(type(i))
        print("Price = ",cal(i,0.10))

def cal(s,v=0.07) :
    return (s + (s*v))

z = (800.0,5100.0,10000.0)


vat(800.0,5100.0,10000.0)
vat(z)
