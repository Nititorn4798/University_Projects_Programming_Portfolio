# pylint: disable=missing-module-docstring
# pylint: disable=missing-class-docstring
# pylint: disable=missing-function-docstring
from datetime import datetime
class SuperRestaurantTablemanagementSystemIn2024:
    res_table_data = {
        '1':1,
        '2':0,
        '3':0,
        '4':0,
        '5':1,
        '6':0,
        '7':0,
        '8':1,
        '9':1,
        '10':1
    }

    def __init__(self,name):
        self.restaurant_name = name
    def restaurant_show_info(self):
        print(f'ยินดีต้อนรับสู่ระบบจัดการโต๊ะร้านอาหาร {self.restaurant_name}')
    def day(self):
        now = datetime.now()
        dt_string = now.strftime("%d/%m/%Y %H:%M:%S")
        return dt_string
    def res_table_data_show(self):
        print('\n+---โต๊ะที่สามารถจองได้---+')
        i = 0
        for table_number, status in self.res_table_data.items():
            if status == 0:
                print('โต๊ะที่ ', table_number, 'สามารถจองได้')
                i += 1
        if i == 0:
            print('\nขออภัยในขณะนี้ไม่มีโต๊ะว่าง')
    def res_table_data_show_reserved(self):
        print('\n+---โต๊ะที่สามารถยกเลิกจองได้---+')
        i = 0
        for table_number, status in self.res_table_data.items():
            if status == 1:
                print('โต๊ะที่ ', table_number, 'สามารถยกเลิกจองได้')
                i += 1
        if i == 0:
            print('\nขออภัยในขณะนี้ไม่มีโต๊ะที่ไม่ว่าง')
    def reserve_table(self,table_num):
        if table_num in self.res_table_data:
            if self.res_table_data[table_num] == 0:
                print('\nคุณจองสำเร็จแล้ว')
                self.res_table_data[table_num] = 1
            else:
                print(f'โต๊ะที่ {table_num} จองไม่ได้')
        else:
            print('\nโต๊ะไหนผมหาไม่เจอ')
    def cancel_reserve_table(self,table_num):
        if table_num in self.res_table_data:
            if self.res_table_data[table_num] == 1:
                print('\nยกเลิกการจองสำเร็จแล้ว')
                self.res_table_data[table_num] = 0
            else:
                print(f'โต๊ะที่ {table_num} จองยกเลิกการจองไม่ได้')
        else:
            print('โต๊ะไหนผมหาไม่เจอ')

restaurant_a = SuperRestaurantTablemanagementSystemIn2024('ร้านเจ๊ไฟประตูผี')
print(f'วันนี่วันที่ {restaurant_a.day()}')
text1 = f'\n{"*"*19}\n'
RUN = True
while RUN:
    restaurant_a.restaurant_show_info()
    while True:
        print(text1)
        restaurant_a.res_table_data_show()
        print(text1)
        print('เลือกการทำงานที่ต้องการ')
        print('1. จองโต๊ะ')
        print('2. ยกเลิกจองโต๊ะ')
        print('3. ออก')
        q = input('\t>>> ')
        match q:
            case '1':
                table_to_reserve = input('\nท่านต้องการจองโต๊ะไหน >>> ')
                restaurant_a.reserve_table(table_to_reserve)
            case '2':
                restaurant_a.res_table_data_show_reserved()
                table_to_reserve = input('\nท่านต้องการยกเลิกการจองโต๊ะไหน >>> ')
                restaurant_a.cancel_reserve_table(table_to_reserve)
            case '3':
                if input('ต้องการใช้งานอีกครั้งหรือไม่ [Y,N] >>> ') not in ['y','Y','']:
                    print('จบการทำงาน จัดทำโดย นายนิติธร นันทสินธ์ 65003263019')
                    RUN = False
                    break
