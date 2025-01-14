class  A :
    @staticmethod
    def add(x,y) :
        return x+y
    @staticmethod
    def show() :
        print("Hi")
    def show2(self) :
        self.pi = 3.1417
        return  self.pi

print("add = ",A.add(5,20))
A.show()
m = A()
print("pi = ",m.show2())
