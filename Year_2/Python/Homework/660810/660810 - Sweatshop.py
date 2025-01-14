from datetime import date,datetime

def clearscreen() :
    print('\033c')
    
def text(t) :
    match t :
        case 1:
            print('---------------------------------')
        case 2:
            print('ท่านมีบัตรสมาชิกหรือไม่ [Y/N]')
        case 3:
            print('กรุณาเลือกสินค้าที่ท่านต้องการ')

def todaydate() :
    today = date.today()
    datesort = today.strftime("%d/%m/%Y")
    return datesort

def yesno_check(q) :
    if q.lower() not in ['y', 'n']:
        return True

class stock:
    order = {}
    pt1 = "ชื่อสินค้า"
    pt2 = "ราคา"
    pt3 = "จำนวน"
    products = {
        "1": {pt1: "เลย์ มันฝรั่งแท้ทอดกรอบแผ่นเรียบ กลิ่นคาโบนาร่า พาร์เมซาน 65 ก.", pt2: 30, pt3: 10},
        "2": {pt1: "เถ้าแก่น้อย สาหร่ายทอดกรอบแผ่นใหญ่ รสสโมคแซลมอนซอสลิ้นจี่ 3.5 ก.", pt2: 10, pt3: 20},
        "3": {pt1: "ฮาริโบ้ เจลลี่แบร์ แฮปปี้ โคล่า ออริจินัล 80 ก.", pt2: 30, pt3: 30},
        "4": {pt1: "ยูปี้ เยลลี่กัมมี่ฮอทดอก 64 ก.", pt2: 25, pt3: 30},
        "5": {pt1: "โยโย่ เยลลี่ เบอร์รี่มิกซ์ ขนาด 80 ก.", pt2: 25, pt3: 30},
        "6": {pt1: "โยโย่ พลัส เยลลี่ รสองุ่น 80 ก.", pt2: 25, pt3: 30},
        "7": {pt1: "โยโย ขนมเยลลี่ รสโยเกิร์ต ขนาด 80 ก.", pt2: 25, pt3: 30},
        "8": {pt1: "ฮอลส์ ไอซ์ซี่ น้ำแข็งไส ลูกอมรสน้ำเชื่อมกลิ่นสตรอว์เบอร์รี่และเมนทอล ถุง 100 เม็ด 280 ก.", pt2: 56, pt3: 30},
        "9": {pt1: "ยูไนเต็ด อัลมอนด์ ช็อกโกแลต แอนด์ ไวท์ช็อกโกแลต 247.5 ก.", pt2: 97, pt3: 30 },
        "10": {pt1: "เฟอร์เรโร รอชเชอร์ กล่อง 30 ชิ้น 375 ก.", pt2: 460, pt3: 30},
        "11": {pt1: "อาร์เซนอล บัตเตอร์คุกกี้ 500 ก.", pt2: 189, pt3: 30},
        "12": {pt1: "เยลลี่เม็ดทุกรส (Bertie Bott's Every Flavour Beans) 227 ก.", pt2: 899, pt3: 1},
        "13": {pt1: "หมูหันหม่อมถนัดแ*ก", pt2: 3500, pt3: 0}
    }
    def __init__(self, customer_name, customer_status):
        self.customer_name = customer_name
        self.customer_status = customer_status
        
    def products_list(self):
        j = 0;
        for i in self.products:
            j += 1
            print(f'== ชื่อสินค้า ==\n{j}. {self.products[i]["ชื่อสินค้า"]}')
            print(f'\tราคา : {self.products[i]["ราคา"]:,d} บาท')
            print(f'\tเหลือ : {self.products[i]["จำนวน"]:,d} ชิ้น')
            text(1)

    def checkstock(self,id="" ):
        if self.products[f"{id}"]["จำนวน"] == 0:
            return "หมด"
        else:
            return "มี"

class buy(stock): #!Inheritance

    def __init__(self, key_product, amount_product = 0):
        self.key_product = f"{key_product}" #!เพิ่ม "" ระหว่างตัวแปร
        self.amount_product = amount_product
        print(self.call_product())
    
    def edit_stock(self,amount = 0):
            #print('Debug : Edit Stock')
            print(f'รหัสสินค้า     : {self.key_product}\nชื่อสินค้า      : {self.products[self.key_product]["ชื่อสินค้า"]}\nจำนวนคงเหลือ : {self.products[self.key_product]["จำนวน"]} - {self.amount_product} = {self.products[self.key_product]["จำนวน"] - self.amount_product}') #!Return To print only #เริ่มทำ 13 เสร็จ 17/8/66
            self.products[self.key_product]["จำนวน"] -= amount
            tempkey = "1"
            if str(tempkey) in self.order:
                while str(tempkey) in self.order:
                    tempkey = int(tempkey) + 1
            self.order[str(tempkey)] = {
                "id_product": self.key_product, "amount": self.amount_product
            }
            #print(self.order)
        
    def call_product(self,  calldef="ชื่อสินค้า"):
        if self.products[self.key_product]["จำนวน"] == 0:
            return f'รหัสสินค้า     : {self.key_product}\nชื่อสินค้า      : {self.products[self.key_product][calldef]}\nจำนวนคงเหลือ : หมด\n\tการดำเนินการไม่สำเร็จ'
        elif self.products[self.key_product]["จำนวน"] - self.amount_product >= 0:
            self.edit_stock(amount=self.amount_product) #!ลบจำนวนสินค้า
            return '\tการดำเนินการสำเร็จ'
        else: 
            return f'รหัสสินค้า     : {self.key_product}\nชื่อสินค้า      : {self.products[self.key_product][calldef]}\nจำนวนคงเหลือ : ไม่พอ (ขาดอีก {-self.products[self.key_product]["จำนวน"] - -self.amount_product} ชิ้น)\n\tการดำเนินการไม่สำเร็จ'

dup1 = '\t>>> ' #!ลดการใช้ซ้ำๆ

def makeorder():
    print(f'คุณ{customerbuy.customer_name}')
    print(f'สถานะ : {customerbuy.customer_status}')
    text(1)
    customerbuy.products_list()
    is_done = False;
    id_product = 0
    print('หากเลือกสินค้าเสร็จแล้วสามารถพิมพ์ "done" "0" "d" หรือกด Enter ในช่องกรอกเลขสินค้าได้เลย')
    while not is_done: #!เหมือน isDone != True แค่ดีกว่า
        reinput = False
        amount_product = 0
        while is_done != True:
            text(1)
            id_product = input('กรุณากรอกเลขสินค้าที่ต้องการ (id) : ')
            if id_product in ['done','0','d','exit','']:
                print('ท่านต้องการจบการสั่งซื้อไหม [Y/N] ?')
                q = str(input(dup1))
                if yesno_check(q):
                    print(f'กรุณากรอกใหม่อีกครั้ง > {q} < ที่กรอกมาไม่ถูกต้อง')
                else:
                    match q.lower():
                        case 'y':
                            if len(customerbuy.order) != 0 :
                                print('\tการสั่งซื้อเสร็จสิ้น')
                                is_done = True
                            else:
                                print('\tกรุณาเลือกสินค้า!')
                        case _ :
                            print('ดำเนินการต่อ')
            elif id_product not in stock.products:
                print('\tไม่พบสินค้า กรอกใหม่อีกครั้ง!!!')
            elif customerbuy.checkstock(id_product) == "หมด":
                print('\tสินค้าหมด กรุณาเลือกสินค้าอื่น!!!')
            else:
                break
        while is_done != True:
            try:
                amount_product = int(input('ใส่จำนวนสินค้าที่ต้องการ : '))
                if amount_product == 0 :
                    reinput = True
                    print('\tยกเลิกแล้ว')
                elif amount_product < 0 :
                    reinput = True
                    print('\tจำนวนไม่ถูกต้อง')
            except:
                print('\tจำนวนไม่ถูกต้อง')
            break
        text(1)
        if reinput != True and is_done != True:
            buy(id_product,amount_product)
#!ระบบสมาชิก
def member():
    global memberId #!ทำให้ตัวแปรนี้ใช้นอกฟังก์ชันได้
    memberId = '' ; fromregister = False ; isguest = False
    while True :
        try :
            text(2)
            ismember = str(input(dup1))
            if yesno_check(ismember):
                print(f'กรุณากรอกใหม่อีกครั้ง > {ismember} < ที่กรอกมาไม่ถูกต้อง')
            else:
                match ismember.lower():
                    case 'y':
                        while True:
                            try:
                                print('ใส่เลขบัตรสมาชิก (6ตัว)')
                                memberId = str(input(dup1))
                                members[memberId] #!เช็คว่ามีใน Dictionary หรือไม่ ถ้าไม่มีจะ Error เข้า except KeyError
                                break
                            except KeyError:
                                print('ไม่พบเลขบัตรสมาชิกของท่าน หรือท่านกรอกไม่ถูกต้อง')
                    case 'n':
                        while memberId == '':
                            print('ท่านต้องการสมัครสมาชิกหรือไม่ [Y/N] ?')
                            q = str(input(dup1))
                            if yesno_check(q):
                                print(f'กรุณากรอกใหม่อีกครั้ง > {q} < ที่กรอกมาไม่ถูกต้อง')
                            match q.lower():
                                case 'y':
                                    while True :
                                        print('กรุณากรอกเบอร์โทรศัพท์ (10ตัว)')
                                        phone_number = str(input(dup1))
                                        if len(phone_number) != 10 or phone_number[0] != '0' or phone_number[1] not in ['6','8','9'] or phone_number.isnumeric() != True:
                                            print(f'กรุณากรอกใหม่อีกครั้ง > {phone_number} {len(phone_number)} ตัว< ที่กรอกมาไม่ถูกต้อง')
                                        else:
                                            while True:
                                                print('กรุณากรอกชื่อของท่าน')
                                                customers_name = str(input(dup1))
                                                if (len(customers_name) != 0) and customers_name.isnumeric() != True:
                                                    break
                                                else:
                                                    print('\tกรุณากรอกใหม่อีกครั้ง')
                                            print('ตรวจสอบข้อมูลของท่าน')
                                            print(f'\tเบอร์โทรศัพท์ : {phone_number}')
                                            print(f'\tชื่อ : {customers_name}')
                                            print('ข้อมูลถูกต้องใช่หรือไม่ [Y/N] ?')
                                            q = str(input(dup1))
                                            if yesno_check(q):
                                                print(f'กรุณากรอกใหม่อีกครั้ง > {q} < ที่กรอกมาไม่ถูกต้อง')
                                            else:
                                                match q.lower():
                                                    case 'y':
                                                        tempkey = "263001"
                                                        if str(tempkey) in members:
                                                            while str(tempkey) in members:
                                                                tempkey = int(tempkey) + 1
                                                        members[str(tempkey)] = {"ชื่อ": str(customers_name),"เบอร์โทรศัพท์": str(phone_number),"สถานะ": "ลูกค้าใหม่","เป็นสมาชิกเมื่อ": todaydate()}
                                                        memberId = str(tempkey)
                                                        clearscreen()
                                                        text(1)
                                                        print(f'การสมัครสมาชิกเสร็จสิ้น ยินดีต้อนรับคุณ {customers_name}')
                                                        print(f'หมายเลขบัตรสมาชิกของท่านคือ {memberId}')
                                                        text(1)
                                                        fromregister = True
                                                        break
                                                    case 'n':
                                                        print('กรุณาทำรายการใหม่อีกครั้ง')
                                case 'n':
                                    isguest = True
                                    memberId = "000000"
                                    break
                break
        except :
            print('เกิดข้อผิดพลาดขึ้นโปรดตรวจสอบข้อมูลที่ท่านกรอก')

    if fromregister == False:
        if isguest == True:
            text(1)
            print('ยินดีต้อนรับ !')
        else:
            text(1)
            print(f'ยินดีต้อนรับคุณ {members[memberId]["ชื่อ"]}')
    text(3)

def report_order():
    global loop, startorderid
    #print('Debug : Enter Report...') #"id_product" "amount":

    startorderid += 1
    print("","─"*148)
    print(f'│{"ใบเสร็จรับเงิน":^151}{" "*0}│') #!148+(3)=151 คือรวมสระภาษาไทย
    print(f'│{"ร้าน SweatShop by Nititorn":^149}{" "*0}│')
    print(f'│{" "*148}│')
    if customerbuy.customer_status == "ไม่ได้เป็นสมาชิก" :
        print(f'│{"":<123}{" "*0}{"เลขที่บิล : ":<20}{"SWES-"}{startorderid:03}│')
    else:
        print(f'│รหัสสมาชิก : {memberId:<112}{" "*0}{"เลขที่บิล : ":<20}{"SWES-"}{startorderid:03}│')
    print(f'│ชื่อลูกค้า   : {customerbuy.customer_name:<59}',end="\n") ; print(f'│ประเภท   : {customerbuy.customer_status}')
    print(f'│{" "*0}{"วันที่ : ":>132}{todaydate():>} {(datetime.now()).strftime("%X"):>}{" "*0}│')
    
    print("","─"*148)
    print(f'│{"No.":^9}{"รหัสสินค้า":<13}{"ชื่อสินค้า":<95}{"ราคา/หน่วย":<15}{"จำนวนที่ชื้อ":<20}{"จำนวนเงิน":>}│')
    print("","─"*148)
    totalprice = 0.0
    cal_price = 0
    for i in range(1,len(customerbuy.order)+1): #!Start At 1 (+1 เพราะเริ่มที่ 1 ไม่ใช่ 0)
        getproduct_name = customerbuy.products[customerbuy.order[str(i)]["id_product"]]["ชื่อสินค้า"]
        getproduct_price = customerbuy.products[customerbuy.order[str(i)]["id_product"]]["ราคา"]
        cal_price = getproduct_price * customerbuy.order[str(i)]["amount"]
        shorted_productname = getproduct_name[:90]
        totalprice += cal_price
        print(f'{i:>6,d}{customerbuy.order[str(i)]["id_product"]:>10}   {shorted_productname}', end="\n")
        print("│"," "*109, end="")
        print(f'{getproduct_price:>9,d}{customerbuy.order[str(i)]["amount"]:>13,d}{cal_price:>16,d}│')
        
    print("","─"*148)
    print(f'│{" "*109}│ รวมเป็นเงิน : {totalprice:>21,.2f} {"บาท":<1}{"│"}')
    match members[str(memberId)]["สถานะ"]:
        case "วีไอพี" :
            discount = totalprice * 0.1
            totalprice -= discount #!ลด 10%
            print(f'│{" "*109}│ ลูกค้าVIP ลด10%! : {discount:>16,.2f} {"บาท":<1}{"│"}') #!,.2f คือ 1,000.00
        case "ลูกค้าใหม่" :
            discount = totalprice * 0.05
            totalprice -= discount
            print(f'│{" "*109}│ ลูกค้าใหม่ ลด5%! : {discount:>17,.2f} {"บาท":<1}{"│"}')
    vat = totalprice * 0.07
    totalprice += vat
    print(f'│{" "*109}│ ภาษีมูลค่าเพิ่ม : {vat:>20,.2f} {"บาท":<1}{"│"}')
    print(f'│{" "*109}│ จำนวนเงินทั้งสิ้น : {totalprice:>18,.2f} {"บาท":<1}{"│"}')
    print("","─"*148)
    while True:
        print('ต้องการดำเนินการอีกครั้งหรือไม่ [Y/N] ?')
        q = input('\t>>> ')
        if yesno_check(q):
            print(f'กรุณากรอกใหม่อีกครั้ง > {q} < ที่กรอกมาไม่ถูกต้อง')
        else:
            match q.lower():
                case 'y':
                    loop = True
                    customerbuy.order.clear() #!Clear Old order
                    break
                case _ :
                    loop = False
                    break
    

members = {
    "000000": {"ชื่อ": "ลูกค้าที่เคารพ","เบอร์โทรศัพท์": "","สถานะ": "ไม่ได้เป็นสมาชิก","เป็นสมาชิกเมื่อ": ""},
    "263019": {"ชื่อ": "นิติธร นันทสินธ์","เบอร์โทรศัพท์": "0936850000","สถานะ": "วีไอพี","เป็นสมาชิกเมื่อ": "13/08/2023"} 
}

startorderid = 0
while True:
    loop = False
    #!Main
    clearscreen()
    text(1)
    print('ยินดีต้อนรับสู่ร้านขายขนมของเรา !')
    print(f'\tวันนี้วันที่ {todaydate()}')
    text(1)

    member()
    customerbuy = stock(members[str(memberId)]["ชื่อ"], members[str(memberId)]["สถานะ"])
    #print(f'Debug : Get memberId is {memberId}')
    makeorder()
    report_order()
    if loop == False:
        break

print('\nจบการทำงาน ขอบคุณที่ใช้บริการ จัดทำโดย นิติธร นันทสินธ์ 65003263019')