"""ระบบจัดการร้านส้มตำ"""
from datetime import datetime
print('นาย นิติธร นันทสินธ์ 65003263019')
# pylint: disable=non-ascii-name
class SomtumShop:
    ordercounter = 1
    stockordercounter = 1
    shop_stock = {
        "มะละกอ" : 0,
        "มะเขือเทศ" : 10,
        "พริก" : 200,
        "น้ํามะนาว" : 50,
        "กระเทียม" : 200,
        "น้ําปลา" : 50,
        "ถั่วฝักยาว" : 200,
        "น้ำตาล" : 50,
        "น้ำปลาร้า" : 50,
        "มะกอก" : 10,
    }
    ingredient_price = {
        "มะละกอ" : 0.012,
        "มะเขือเทศ" : 5,
        "พริก" : 0.85,
        "น้ํามะนาว" : 0.7,
        "กระเทียม" : 0.1,
        "น้ําปลา" : 0.03,
        "ถั่วฝักยาว" : 0.05,
        "น้ำตาล" : 0.025,
        "น้ำปลาร้า" : 0.05,
        "มะกอก" : 5,
    }
    shop_sales = {}
    shop_stockorderlist = {}
    shop_money = 0
    
    @classmethod
    def modifer_money(cls,money):
        cls.shop_money = money
    
    def __init__(self):
        self.shop_name = input('กรอกชื่อร้านที่ต้องการ : ')
        self.shop_phonenumber = input('กรอกเบอร์โทรร้าน : ')
        self.shop_worktime = input('กรอกเวลาเปิด-ปิดร้าน : ')
        
        print(f'\n\nยินดีต้อนรับสู่ระบบจัดการร้านอาหารประจำร้าน "{self.shop_name}"')
        print(f'ข้อมูลประจำร้าน\n\tเบอร์โทรศัพท์ : {self.shop_phonenumber}\n\tเวลาเปิด-ปิด : {self.shop_worktime}\n')

    @classmethod
    def buy_stock(cls,tofill_ingredient,amount):
        """ระบบซื้อวัตถุดิบ"""
        if cls.ingredient_price[tofill_ingredient] * amount > cls.shop_money:
            print(f'เงินไม่เพียงพอต้องการอีก {(cls.ingredient_price[tofill_ingredient] * amount) - cls.shop_money} บาท')
            return 'not_enought'
        else:
            cls.shop_money -= cls.ingredient_price[tofill_ingredient] * amount
            print(f'\nซื้อ {tofill_ingredient} สำเร็จใช้เงินไป {cls.ingredient_price[tofill_ingredient] * amount} บาท เงินคงเหลือคือ {cls.shop_money} บาท\n')
            now = datetime.now()
            dt_string = now.strftime("%Y%m%d_%H%M")
            dt_string_b = now.strftime("%d/%m/%Y %H:%M:%S")
            #! "orderid" : {"paid":0,"menu":"ชื่อเมนู","datetime":"เวลา"}
            tmp_dict = {
                f"{dt_string}_stbl_{cls.stockordercounter}" : {
                    "stockorderoftheday": cls.stockordercounter,
                    "ingredient": tofill_ingredient,
                    "amount": amount,
                    "paid": cls.ingredient_price[tofill_ingredient] * amount,
                    "datetime": dt_string_b
                }
            }
            cls.shop_stockorderlist.update(tmp_dict)
            return amount

    def check_stockorderlist(self):
        """ตรวจสอบรายการสั่งซื้อ"""
        if len(self.shop_stockorderlist):
            for key_x, value_x in self.shop_stockorderlist.items():
                print(f"ID : {key_x}")
                print(f"ลำดับการสั่งซื้อ : {value_x['stockorderoftheday']}")
                print(f"ชื่อวัตถุดิบ : {value_x['ingredient']}")
                print(f"จำนวน : {value_x['amount']}")
                print(f"จำนวนเงิน : {value_x['paid']}")
                print(f"วันเวลาที่สั่งซื้อ : {value_x['datetime']}")
                print(f'{"*"*20}')
        else:
            print('ไม่พบรายการสั่งซื้อ')

    def check_shop_sales(self):
        """ตรวจสอบรายการขาย"""
        if len(self.shop_sales):
            for key_x, value_x in self.shop_sales.items():
                print(f"ID : {key_x}")
                print(f"ลำดับการขาย : {value_x['orderoftheday']}")
                print(f"ชื่อเมนู : {value_x['menu']}")
                print(f"จำนวนเงิน : {value_x['paid']}")
                print(f"วันเวลาที่ขาย : {value_x['datetime']}")
                print(f'{"*"*20}')
        else:
            print('\tไม่พบรายการขาย')

    def fill_stock(self,tofill_ingredient,noun_classifier):
        """ฟังก์ชันเติมวัตถุดิบ"""
        print(f'\tกำลังซื้อวัตถุดิบ {tofill_ingredient} ราคา{noun_classifier} ละ {self.ingredient_price[tofill_ingredient]} บาท')
        while True:
            amount = int(input(f'กรอกจำนวนที่ต้องการซื้อ ({noun_classifier}) : '))
            result = self.buy_stock(tofill_ingredient,amount)
            match (result):
                case 'not_enought':
                    print('เงินไม่เพียงพอในการซื้อวัตถุดิบกรุณาลองใหม่อีกครั้ง')
                    if input('ต้องการซื้อใหม่หรือไม่? [Y/N] : ').upper() not in ['Y']:
                        break
                case _:
                    self.shop_stock[tofill_ingredient] += result
                    break

    def get_stock(self):
        """ฟังก์ชันรับข้อมูลวัตถุดิบ"""
        print('\n\tกำลังรับข้อมูลวัตถุดิบ')
        chk_ok = True
        for ingredient, amount in self.shop_stock.items():
            match ingredient:
                case "มะเขือเทศ" | "มะกอก":
                    if amount <= 1:
                        chk_ok = False
                        print(f'{ingredient} มีจำนวนน้อย ({amount} ลูก) ต้องการซื้อเพิ่มไหม? [Y/N] : ',end='')
                        if input().upper() not in ['N']:
                            self.fill_stock(ingredient,'ลูก')
                case "น้ำปลา" | "น้ำปลาร้า" | "น้ํามะนาว":
                    if amount <= 100:
                        chk_ok = False
                        print(f'{ingredient} มีจำนวนน้อย ({amount} มิลลิลิตร) ต้องการซื้อเพิ่มไหม? [Y/N] : ',end='')
                        if input().upper() not in ['N']:
                            self.fill_stock(ingredient,'มิลลิลิตร')
                case _:
                    if amount <= 200:
                        chk_ok = False
                        print(f'{ingredient} มีจำนวนน้อย ({amount} กรัม) ต้องการซื้อเพิ่มไหม? [Y/N] : ',end='')
                        if input().upper() not in ['N']:
                            self.fill_stock(ingredient,'กรัม')
        if chk_ok:
            print('\nตรวจสอบข้อมูลสินค้าสำเร็จ ไม่พบวัตถุดิบที่หมดหรือเหลือน้อยมากเกินไป')

    @classmethod
    def shop_calculate(cls,paid,menu_name):
        """คำนวณยอดขาย"""
        now = datetime.now()
        dt_string = now.strftime("%Y%m%d_%H%M")
        dt_string_b = now.strftime("%d/%m/%Y %H:%M:%S")
        #! "orderid" : {"paid":0,"menu":"ชื่อเมนู","datetime":"เวลา"}
        tmp_dict = {
            f"{dt_string}_stod_{cls.ordercounter}" : {
                "orderoftheday": cls.ordercounter,
                "paid": paid,
                "menu": menu_name,
                "datetime": dt_string_b
            }
        }
        cls.shop_sales.update(tmp_dict)
        cls.ordercounter += 1

    def cooking_somtum(self,**kwargs_ingredient):
        """ฟังก์ชันปรุงส้มตำ"""
        print('\n\tกำลังปรุงส้มตำ...')
        for ingredient, touse_amount in kwargs_ingredient.items():
            match ingredient:
                case "มะเขือเทศ" | "มะกอก":
                    noun_classifier = 'ลูก'
                case "น้ำปลา" | "น้ำปลาร้า" | "น้ํามะนาว":
                    noun_classifier = 'มิลลิลิตร'
                case _ :
                    noun_classifier = 'กรัม'
            while True:
                if self.shop_stock[ingredient] >= touse_amount:
                    print(f'-- {ingredient} ใช้ไป {touse_amount} {noun_classifier} คงเหลือ {self.shop_stock[ingredient] - touse_amount} {noun_classifier}')
                    self.shop_stock[ingredient] -= touse_amount
                    break
                else:
                    print(f'!-- {ingredient} มีจำนวนไม่เพียงพอ ({self.shop_stock[ingredient]} {noun_classifier}) ต้องการใช้ ({touse_amount} {noun_classifier}) ขาดอีก ({touse_amount - self.shop_stock[ingredient]} {noun_classifier}) ต้องการวิ่งไปซื้อเพิ่มไหม? [Y/N] : ',end='')
                    if input().upper() not in ['N']:
                        self.fill_stock(ingredient,noun_classifier)
                    else:
                        print('วัตถุดิบไม่เพียงพอ ยกเลิกการปรุง')
                        return 0
        return 'ok'

class Tumtaishop(SomtumShop):
    """Class ร้านตำไทย"""
    tumtai_recipe = {"มะละกอ":100, "มะเขือเทศ":2, "พริก":5, "น้ํามะนาว":20, "กระเทียม":10, "น้ำปลา":10}
    def __init__(self):
        super().__init__()
        shop_detail = 'ร้านส้มตำไทยแซ่บๆ'
        self.modifer_money(int(input('กรอกจำนวนเงินทุนเปิดร้าน : ')))
        print(f"เงินทุนในการใช้เปิดร้าน : {self.shop_money} บาท")
        print(f'\tกำลังจัดการร้านประเภท -> ตำไทย <- #{shop_detail}')

    def makeorder_tumtai(self):
        """ปรุงตำไทย"""
        if self.cooking_somtum(มะละกอ=100, มะเขือเทศ=2, พริก=5, น้ํามะนาว=20, กระเทียม=10, น้ำปลา=10) == 'ok':
            print('\n\t++ ปรุงส้มตำไทยสำเร็จ ได้รับเงิน 50บาท\n')
            return 'ok_cooking'

class TumlaoShop(SomtumShop):
    """Class ร้านตำลาว"""
    tumlao_recipe = {"มะละกอ":100, "มะเขือเทศ":2, "พริก":5, "น้ํามะนาว":20, "กระเทียม":10, "น้ำปลา":10, "น้ำปลาร้า":10, "น้ำตาล":5}
    def __init__(self):
        super().__init__()
        shop_detail = 'ร้านส้มตำลาวแซ่บๆ โจ๊ะๆ'
        self.modifer_money(int(input('กรอกจำนวนเงินทุนเปิดร้าน : ')))
        print(f"เงินทุนในการใช้เปิดร้าน : {self.shop_money} บาท")
        print(f'\tกำลังจัดการร้านประเภท -> ตำลาว <- #{shop_detail}')

    def makeorder_tumlao(self):
        """ปรุงตำลาว"""
        if self.cooking_somtum(มะละกอ=100, มะเขือเทศ=2, พริก=5, น้ํามะนาว=20, กระเทียม=10, น้ำปลา=10, น้ำปลาร้า=10, น้ำตาล=5) == 'ok':
            print('\n\t++ ปรุงส้มตำลาวสำเร็จ ได้รับเงิน 55บาท\n')
            return 'ok_cooking'

class Tumpuparashop(SomtumShop):
    """Class ร้านตำปูปลาร้า"""
    tumpupara_recipe = {"มะละกอ":100, "มะเขือเทศ":2, "พริก":5, "น้ํามะนาว":20, "กระเทียม":10, "น้ำปลา":10, "น้ำปลาร้า":10, "มะกอก":1, "ถั่วฝักยาว":5}
    def __init__(self):
        super().__init__()
        shop_detail = 'ร้านส้มตำปูปลาร้าแซ่บๆ เด้อ'
        self.modifer_money(int(input('กรอกจำนวนเงินทุนเปิดร้าน : ')))
        print(f"เงินทุนในการใช้เปิดร้าน : {self.shop_money} บาท")
        print(f'\tกำลังจัดการร้านประเภท -> ตำปูปลาร้า <- #{shop_detail}')

    def makeorder_tumpupara(self):
        """ปรุงตำปูปลาร้า"""
        if self.cooking_somtum(มะละกอ=100, มะเขือเทศ=2, พริก=5, น้ํามะนาว=20, กระเทียม=10, น้ำปลา=10, น้ำปลาร้า=10, มะกอก=1, ถั่วฝักยาว=5) == 'ok':
            print('\n\t++ ปรุงส้มตำปูปลาร้าสำเร็จ ได้รับเงิน 60บาท\n')
            return 'ok_cooking'

while True:
    print('ระบบจัดการร้านส้มตำ\n')
    print('\tกรุณาเลือกประเภทร้านส้มตำที่ท่านต้องการเปิด')
    print('\t1. ร้านส้มตำไทย')
    print('\t2. ร้านส้มตำลาว')
    print('\t3. ร้านส้มตำปูปลาร้า')
    choice = input('\t>>> ')
    loop_run = True
    while loop_run:
        match choice:
            case '1':
                if 'somtumthi_shop' not in dir():
                    somtumthi_shop = Tumtaishop()
                    print('\nกำลังตรวจสอบวัตถุดิบครั้งแรก...')
                    somtumthi_shop.get_stock()
                else:
                    print(f'\nกลับสู่ร้านเดิม > กำลังเข้าสู่ระบบ... (ตำไทย) ({somtumthi_shop.shop_name})')
                    while True:
                        print('เลือกการทำงานที่ต้องการ')
                        print('\t1. ตรวจสอบและเติมสต๊อกวัตถุดิบ')
                        print('\t2. ปรุงส้มตำ')
                        print('\t3. ดูบันทีกรายการขาย')
                        print('\t4. ดูบันทีกรายการสังซื้อสินค้า')
                        print('\t5. ออกจากระบบ')
                        w_choice = input('\t>>> ')
                        match w_choice:
                            case '1':
                                somtumthi_shop.get_stock()
                            case '2':
                                if somtumthi_shop.makeorder_tumtai() == 'ok_cooking':
                                    somtumthi_shop.shop_calculate('50','ตำไทยแซ่บๆ by ร้าน tumtai')
                            case '3':
                                print('\nกำลังตรวจสอบยอดขาย...')
                                somtumthi_shop.check_shop_sales()
                                break
                            case '4':
                                print('\nกำลังตรวจสอบรายการสั่งซื้อ...')
                                somtumthi_shop.check_stockorderlist()
                                break
                            case '5':
                                print('\nกำลังออกจากระบบ...')
                                choice = 'exit'
                                break
            case '2':
                if 'somtumlao_shop' not in dir():
                    somtumlao_shop = TumlaoShop()
                    print('\nกำลังตรวจสอบวัตถุดิบครั้งแรก...')
                    somtumlao_shop.get_stock()
                else:
                    print(f'\nกลับสู่ร้านเดิม > กำลังเข้าสู่ระบบ... (ตำลาว) ({somtumlao_shop.shop_name})')
                    while True:
                        print('เลือกการทำงานที่ต้องการ')
                        print('\t1. ตรวจสอบและเติมสต๊อกวัตถุดิบ')
                        print('\t2. ปรุงส้มตำ')
                        print('\t3. ดูบันทีกรายการขาย')
                        print('\t4. ดูบันทีกรายการสังซื้อสินค้า')
                        print('\t5. ออกจากระบบ')
                        w_choice = input('\t>>> ')
                        match w_choice:
                            case '1':
                                somtumlao_shop.get_stock()
                            case '2':
                                if somtumlao_shop.makeorder_tumtai() == 'ok_cooking':
                                    somtumlao_shop.shop_calculate('55','ตำลาวแซ่บๆ by ร้าน tumlao')
                            case '3':
                                print('\nกำลังตรวจสอบยอดขาย...')
                                somtumlao_shop.check_shop_sales()
                                break
                            case '4':
                                print('\nกำลังตรวจสอบรายการสั่งซื้อ...')
                                somtumlao_shop.check_stockorderlist()
                                break
                            case '5':
                                print('\nกำลังออกจากระบบ...')
                                choice = 'exit'
                                break
            case '3':
                if 'somtumpupara_shop' not in dir():
                    somtumpupara_shop = Tumpuparashop()
                    print('\nกำลังตรวจสอบวัตถุดิบครั้งแรก...')
                    somtumpupara_shop.get_stock()
                else:
                    print(f'\nกลับสู่ร้านเดิม > กำลังเข้าสู่ระบบ... (ปูปลาร้า) ({somtumpupara_shop.shop_name})')
                    while True:
                        print('เลือกการทำงานที่ต้องการ')
                        print('\t1. ตรวจสอบและเติมสต๊อกวัตถุดิบ')
                        print('\t2. ปรุงส้มตำ')
                        print('\t3. ดูบันทีกรายการขาย')
                        print('\t4. ดูบันทีกรายการสังซื้อสินค้า')
                        print('\t5. ออกจากระบบ')
                        w_choice = input('\t>>> ')
                        match w_choice:
                            case '1':
                                somtumpupara_shop.get_stock()
                            case '2':
                                if somtumpupara_shop.makeorder_tumtai() == 'ok_cooking':
                                    somtumpupara_shop.shop_calculate('60','ตำปูปลาร้าแซ่บๆ by ร้าน Pupara')
                            case '3':
                                print('\nกำลังตรวจสอบยอดขาย...')
                                somtumpupara_shop.check_shop_sales()
                                break
                            case '4':
                                print('\nกำลังตรวจสอบรายการสั่งซื้อ...')
                                somtumpupara_shop.check_stockorderlist()
                                break
                            case '5':
                                print('\nกำลังออกจากระบบ...')
                                choice = 'exit'
                                break
            case 'exit':
                break
