from datetime import date #done 25-7-66

def iserror(err):
    print('\033c')
    print(f'\nโปรแกรมผิดพลาดที่ {err}')
    exit()

def welcome() :
    print('ยินดีต้อนรับสู่ร้านกะเพราของเรา')

def todaydate() :
    today = date.today()
    datesort = today.strftime("%d/%m/%Y")
    return datesort

def datastock(st,mode) :
    match st:
        case 'หมู':
            if หมู > 0 and mode == 'get':
                print(f'    เหลือหมู {หมู:.1f} โล')
            elif mode == 'get':
                print('    หมู หมด')
            if หมู > 0 and mode == 'check':
                return 'ok'
            elif mode == 'check' :
                return 'ost' #out of stock
        case 'ไก่':
            if ไก่ > 0 and mode == 'get':
                print(f'    เหลือไก่ {ไก่:.1f} โล')
            elif mode == 'get':
                print('    ไก่ หมด')
            if ไก่ > 0 and mode == 'check':
                return 'ok'
            elif mode == 'check' :
                return 'ost' #out of stock
        case 'หมูกรอบ':
            if หมูกรอบ > 0 and mode == 'get':
                print(f'    เหลือหมูกรอบ {หมูกรอบ:.1f} โล')
            elif mode == 'get':
                print('    หมูกรอบ หมด')
            if หมูกรอบ > 0 and mode == 'check':
                return 'ok'
            elif mode == 'check' :
                return 'ost' #out of stock
        case _:
            iserror('การเลือกวัตถุดิบ ผิดพลาด!')

def txtop(t) :
    match t:
        case 't1':
            print('เลือกวัตถุดิบกะเพราที่ท่านต้องการ (หมู ,ไก่ ,หมูกรอบ)')
        case 't2':
            print('วัตถุดิบวันนี้มี ')
        case 't3':
            print('เลือกระดับความเผ็ดที่ท่านต้องการ (1-5)')
        case 't4':
            print('เลือกขนาดจานที่ท่านต้องการ (s m l xl xxl)')
        case 't5':
            print('สรุปออเดอร์ที่ท่านสั่งมาคือ')

def spicylevel(spcl) :
    match spcl:
        case 1:
            return 'ไม่เผ็ด'
        case 2:
            return 'เผ็ดน้อย'
        case 3:
            return 'เผ็ดปานกลาง'
        case 4:
            return 'เผ็ดมาก'
        case 5:
            print('*--ไหวบ่อ้าย (เผ็ดมากๆๆ)--*')
            return 'เผ็ดสุดสุด'
        case _:
            iserror('การเลือกระดับความเผ็ด ผิดพลาด!')

def sizeselect(size,modes) :
    txterrdup = 'ผิดพลาด! วัตถุไม่เพียงพอที่จะทำออเดอร์'
    match size:
        case 's':
            if modes == 1:
                if (globals()[selectmat] - 0.07) >= 0:
                    globals()[selectmat] -= 0.07
                else:
                    iserror(txterrdup)
            return 'เล็ก'
        case 'm':
            if modes == 1:
                if (globals()[selectmat] - 0.1) >= 0:
                    globals()[selectmat] -= 0.1
                else:
                    iserror(txterrdup)
            return 'ปกติ'
        case 'l':
            if modes == 1:
                if (globals()[selectmat] - 0.15) >= 0:
                    globals()[selectmat] -= 0.15
                else:
                    iserror(txterrdup)
            return 'ใหญ่'
        case 'xl':
            if modes == 1:
                if (globals()[selectmat] - 0.3) >= 0:
                    globals()[selectmat] -= 0.3
                else:
                    iserror(txterrdup)
            return 'ใหญ่มาก'
        case 'xxl':
            if modes == 1:
                if (globals()[selectmat] - 0.9) >= 0:
                    globals()[selectmat] -= 0.9
                else:
                    iserror(txterrdup)
            return 'ใหญ่มากมาก'
        case _:
            iserror('การเลือกขนาด ผิดพลาด!')

def pricecal(sel_m,sel_l,sel_s) :
    totalprice = 0
    m = 0
    match sel_m:
        case 'หมู':
            m = 50
        case 'ไก่':
            m = 45
        case 'หมูกรอบ':
            m = 60
    if sel_l > 3: #!คิดค่าความเผ็ด
        l = 5
    else:
        l = 0
    match sel_s:
        case 's':
            totalprice = 0.7 * (m + l)
        case 'm':
            totalprice = 1.0 * (m + l)
        case 'l':
            totalprice = 1.5 * (m + l)
        case 'xl':
            totalprice = 2.0 * (m + l)
        case 'xxl':
            totalprice = 3.0 * (m + l)
    return totalprice

material = ['หมู','ไก่','หมูกรอบ']
หมู = 10.0 ; ไก่ = 15.0 ; หมูกรอบ = 0.0 ; 

#!Main Program

print('*** StartUp Mode เจ้าของร้าน ***')
admininput = input('จะทอดหมูกรอบเพิ่ม 5 โลหรือไม่ (Y, N) >> ')
if admininput in ['Y','y']:
    หมูกรอบ += 5.0

while True:
    print('\033c')
    welcome()
    print('วันนี้วันที่',todaydate())

    txtop('t1')

    while True :
        txtop('t2')
        for i in material :
            datastock(i,'get')
        selectmat = str(input('    เลือกวัตถุดิบ >>>  '))
        if datastock(selectmat,'check') == 'ost': #out of stock
            print('\033c')
            print('กรุณาเลือกใหม่อีกครั้ง')
            datastock(selectmat,'get')
        else:
            break
        
    txtop('t3')
    selectlevel = int(input('    เลือกระดับความเผ็ด (1-5) >>> '))
    print(f'ท่านเลือก {spicylevel(selectlevel)}')
    
    txtop('t4')
    selectsize = str(input('    เลือกขนาดจาน >>> '))
    print(f'ท่านเลือกจานขนาด {sizeselect(selectsize,0)}')

    print('\033c')
    txtop('t5')
    print(f'กะเพรา{selectmat}ระดับความเผ็ด {selectlevel} ({spicylevel(selectlevel)}) ขนาดจาน {sizeselect(selectsize,1)}')
    print(f'ราคาที่ท่านต้องจ่ายคือ {pricecal(selectmat,selectlevel,selectsize)} บาท ')
    if input('\nท่านต้องการสั่งอีกครั้งไหม (Y, N) >>> ') not in ['Y','y']:
        break

print('\nจบการทำงาน ขอบคุณที่ใช้บริการ จัดทำโดย นิติธร นันทสินธ์ 65003263019')