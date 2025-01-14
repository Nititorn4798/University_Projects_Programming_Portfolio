class  A :
    Cal = 1
    __Max = 100
    _Min = 50

    def __init__ (self,m) :
        self.Cal = m
    def showA(self) :
        print("local = ",self.Cal)
        print("Gobal = ",A.Cal)
class  B(A) :
    pass

p = B(12)
p.showA()
print("min = ",p._Min)
