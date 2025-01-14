# pylint: disable=missing-module-docstring
# pylint: disable=missing-class-docstring
# pylint: disable=missing-function-docstring
import random
class Show:
    def __init__(self,name,salary):
        print('init nana')
        self.name = name
        self.salary = salary
    def show_info(self):
        print(f'name : {self.name}')
        print(f'salary : {self.salary}')
        print(f'Bonus : {self.give_bonus()}')
        print(f'The Lucky Number is {self.give_random_number()}')
    def give_bonus(self):
        return self.salary * int(input('\tต้องการโบนัสกี่เปอร์เซ็น เช่น 10% = 0.1 >>> '))
    def day_info(self,text,day_num):
        print(text,day_num)

    @staticmethod
    def give_random_number():
        return random.randint(1,9)

ok = Show('Yamifar',200000.0)

ok.show_info()
print(f'Hi, {ok.name}')
ok.day_info('วันนี้วันที่ ',31)
