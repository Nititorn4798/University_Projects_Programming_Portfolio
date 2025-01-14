class  A :
    Cal = 1

    def __init__ (self,m) :
        self.Cal = m
    def showA(self) :
        print("local = ",self.Cal)
        print("Gobal = ",A.Cal)
p = A(5)
p.showA()
r = A(10)
r.showA()
