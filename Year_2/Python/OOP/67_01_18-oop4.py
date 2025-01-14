class  A :
    Cal = 1
    __Max = 100
    _Min = 50
    def __init__ (self,m) :
        self.Cal = m
    def showA(self) :
        print("local = ",self.Cal)
        print("Gobal = ",A.Cal)
        print("Privat Max = ",A.__Max)
    def __showS(self) :
        print("Hi")
    def showP(self)    :
        self.__showS()
class  B(A) :
    pass
p = B(12)
p.showA()
print("min = ",p._Min)
print("local cal = ",p.Cal)
p.showP()
