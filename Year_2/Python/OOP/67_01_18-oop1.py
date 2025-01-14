class  Sarapao  :
    tt1 = 0
    tt2 = 0
    tt3 = 0
    total = 0.0
    def  __init__(self, no, vol, pri) : #constructor
        print('Init')
        self.no = no
        self.vol = vol
        self.pri = pri
        m  = self.vol*self.pri
        Sarapao.total += m
        if self.no  == '1'  :
            Sarapao.tt1 += 1
        elif self.no == '2'  :
            Sarapao.tt2 += 1
        else :
            Sarapao.tt3 += 1

a = Sarapao('1',2,7.50)
b = Sarapao('2',4,5)
c = Sarapao('3',10,20)
d = Sarapao('1',5,5)

print("total = ",a.total)
print("TT1 = ",a.tt1)
print("TT2 = ",a.tt2)
print("TT3 = ",a.tt3)
print(Sarapao.tt1)
print(Sarapao.tt2)
print(Sarapao.tt3)
print(Sarapao.total)
print(b.tt1)
print(b.tt2)
print(b.tt3)
print(b.total)
print(b.pri)
print(c.tt1)
print(c.tt2)
print(c.tt3)
print(c.total)
print(c.pri)
print(d.tt1)
print(d.tt2)
print(d.tt3)
print(d.total)
print(d.pri)


