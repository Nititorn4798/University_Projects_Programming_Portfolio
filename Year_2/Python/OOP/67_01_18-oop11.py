class  A  :
    __Max = 0
    _Min = 3
    one = 1
    def show1(self) :
        print("one = ",A.one)
    def _show2(self) :
        print("Min = ",A._Min)
    def __show3(self) :
        self.__Max = 50
    def show4(self)  :
        self.__show3()
        print("Max = ",self.__Max)
m = A()
m.show1()
# m._show2()
m.show4()
