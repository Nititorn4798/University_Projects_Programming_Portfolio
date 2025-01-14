class  A :
    @staticmethod
    def discount(x,y=0.05) :  #static method
        return x-(x*y)
    def dis2(self,x,y=0.05)   :  #class method
        self.x = x
        self.y = y
        return self.x-(self.x*self.y)
print("sell = ",A.discount(1000))      #static method
print("sell = ",A.discount(1000,0.10))
a = A()
print("sell = ",a.dis2(1000))   #class method
print("sell = ",a.dis2(1000,0.10))

