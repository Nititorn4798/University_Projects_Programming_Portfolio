class Formatt:
    fr = 'name = {} \nmoney = {}'
    name = 'Nititorn'
    money = 2000000000000000000000000000000000000000
    def show(self):
        print(self.fr.format(self.name,self.money))

q = Formatt()
q.show()
class FormattX:
    fr = 'name = {t} \nmoney = {tt}'
    name = 'Nititorn'
    money = 989895899299585284284242472492478244
    def show(self):
        print(self.fr.format(t=self.name,tt=self.money))

q = Formatt()
q.show()
qA = FormattX()
qA.show()