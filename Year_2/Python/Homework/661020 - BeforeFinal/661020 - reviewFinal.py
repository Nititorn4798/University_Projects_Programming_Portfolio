
def  salaryOT(s,ot)  : 
    otPh = s/30/8 
    return s+(otPh*ot)
result = salaryOT(40000,45) 
print("Sum salary = ",result)
print("Salary this month = ",salaryOT(50000,50))

def   DivN(x, y=None)  :
    if y == None :
        y=1  
        print("y is None.")  
    if y == 0  :
        return 0  
    return x/y  
ans1 = DivN(50,200)  
print("ans1 = ",ans1)   
ans2 = DivN(800) 
print("ans2 = ",ans2)  

def  Person(fn, add, age) :
    print("N ",fn,"@ ",add,"Ag ", age)
Person(age=20, add="Bangkok",fn="โคนันคุง")
Person(add="Panutnikom",age=20,fn="คุโด๋ คุ้ง")

def  pvat(price, vat=0.07) :
    return price+(price*vat)
total = pvat(10000)
total2 = pvat(20000,0.10)  
print("price vat0.07 = ",total) 
print("price vat0.10 = ",total2)
print("price vat0.15 = ",pvat(30000,0.15))

def  ReadData(*num)   :
    for i in num :
        print("num = ",i)  
def  ReadData2(*dat)     :
    for i in dat :
        print("data = ",i)   
ReadData(100)        
ReadData(1,2,3,4,5) 
ReadData2("toyota", "nissan","ford")

def  ReadPrice(*price)   :
    for i in price :
        net= Vat(i)
        print("net = ",net)  
def  Vat(p,vat=0.07)     :
    return p+(p*0.07)  
ReadPrice(1000,5000,20000,70)

def  emp (name,occup,salary,ot) :
    print("name=",name) 
    print("ocup =",occup)
    print("net salary = ",sot(salary,ot))
def  sot(s,ot)     :
    otph = s/30/8 
    return s+(otph*ot)
emp(name="คุโด้ ชินอิจิ",occup="ยอดนักสืบม. ปลาย",salary=4869,ot=99)

def main():
    print("Hello World")
    def sub_func1():
        print("This is sub function (Inner Function) 1.")
    print("Welcome Thailand")
    def sub_func2():
        print("This is sub function (Inner Function) 2.")
        def subsub_func22():
            print("This is subsub function (Inner Function) 2.2")
        subsub_func22()
    print("Bye Bye Your Welcome")
    sub_func1()
    sub_func2()
print('\033c')
print("="*20,"\nEnter Main Function\n\n")
main()
print("\n\nExit Main Function")

def maind():
    def thailand():
        print("Thailand  สวัสดี ")
        def singapore():
            print("Singapore หนีห่าว")
            def laos():
                print("Laos      สะบายดี")
                def myanmar():
                    print("Myanmar   มิงกาลาบา")
                    def cambodia():
                        print("Cambodia  ซัวสเด")
                    cambodia()
                myanmar()
            laos()
        singapore()
    thailand()
print('\033c')
print("ยินดีต้อนรับสู่โปรแกรมแนะนำคำทักทายในประเทศอาเซียน")
maind()

def calculate(i1,i2,oper):
    result = 0 
    match oper:
        case '+':
            result = i1 + i2
        case '-':
            result = i1 - i2
        case '/':
            result = i1 / i2
        case '*' | 'x':
            result = i1 * i2
        case _ :
            return "error"
    def resultbe(result,i1,i2,oper):
        text = "the result of " + str(i1) + " " + oper + " " + str(i2) + " is " + str(result)
        return text
    return resultbe(result,i1,i2,oper)

print("\033c")
print(calculate(50,20,'+'))
print(calculate(50,20,'-'))
print(calculate(10,20,'*'))
print(calculate(10,20,'pp'))

pathh = "/Dev/Coding/Python/Inclass/Homework/660911"
with open(f"{pathh}/t1.txt", "r", encoding="utf-8") as fileX:
    print(fileX.read())
    
f = open("/Dev/Coding/Python/Inclass/Homework/660911/t1.txt", "r", encoding="utf-8")
for i in f:
    print(i)
f.close()

f = open("/Dev/Coding/Python/Inclass/Homework/660911/t1.txt", "r", encoding="utf-8")
for indeX,text in enumerate(f):
    print(f'{indeX} {text}')
f.close()

ff = open(f'{mypath}/{myfile}', 'a', encoding="utf-8") #!Append Only
ff.write("\n") #!ขึ้นบรรทัดใหม่
ff.write("Add New Line")
ff.close()

fff = open(f'{mypath}/{myfile}', 'w', encoding="utf-8") #!W Only
fff.write("1. Line One")
fff.write("\n")
fff.write("2. Line Two")
fff.write("\n")
fff.write("3. Line CALL")
fff.write("\n")
fff.close()

try:
    fh = open(f'{mypath}/{myfile}', 'x', encoding="utf-8") #!exclusive creation
except:
    mypathh = "/Dev/Coding/Python/Inclass/Homework/660911/t4.txt"
    os.remove(mypathh)

ff = open(f'{mypath}/{myfile}', 'w+', encoding="utf-8") #!W Only
while True:
    x = input("Input data [พิมพ์ 'exit' เพื่อออก] : ")
    if x == "exit":
        print("จบการทำง่าน")
        break
    ff.write("\n")
    ff.write(x)
ff.close()

f = open("t2.txt","r")
for  i in f  :
    print(i)
f.close()

x = int(input("แม่สูตรคูณ ถึงแม่ไหน "))
for j in range(2,x+1)  :
    for k in range(1,13) :
        print("f",j,"*",k,"=",j*k)
        for i in range(1,2) :
            print("----------------")
    print("********************")

#x = 5
try: 
    for i in range(3) :
        print(x)
    
except:
    print("An exception occurred")

try:
    f = open("war2.txt","a",encoding="utf-8")
    try:
        f.write("\n"+"4.สบายดีบางคล้า ร้านมิลค์")
    except:
        print("เขียนไฟล์ไม่ได้")
    finally:
        f.close()
except:
    print("เปิดไฟล์ไม่ได้")

x = 10

if not type(x) is int:
    raise TypeError("ต้องเป็นจำนวนเต็มเท่านั้น")
else :
    print("จำนวนเต็ม")

x = -1

if x < 0:
    raise Exception("Sorry, no numbers below zero")
else :
    print("x มากกว่าหรือเท่ากับ 0","x = ",x)

