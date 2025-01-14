import time
import os
import sys
from datetime import datetime
try:
    import binascii
    import hashlib
except ImportError:
    pass
import binascii
import hashlib


print('โปรแกรมคำนวณสูตรฟิสิกส์')
SYSPATH = os.path.dirname(os.path.abspath(sys.argv[0]))
LOGFILE = "LOG_cal_phy_cs019.txt"
HEX = "4e697469746f726e204e616e746173696e204353303139"
if (hashlib.sha256(HEX.encode())).hexdigest() not in ['060e12c5c766f30a910deefa77c70d132c8e5f3d616ab8d4717b63416159e220']:
    print('! พบข้อผิดพลาด')
    exit()

try:
    byte_string = binascii.unhexlify(HEX)
    DECODED = byte_string.decode("utf-8")
except NameError:
    DECODED = "CS019"

@staticmethod
def secure_input(text,mode='chk_float'):
    """ฟังก์ชันตรวจสอบการรับข้อมูล"""
    prefix = ''
    match mode:
        case 'chk_float':
            prefix = '(FLT) '
        case 'chk_int':
            prefix = '(Int) '
    def check_input_isnumber(value):
        if mode == 'chk_float':
            try:
                float(value)
                return True
            except (ValueError):
                return False
        elif mode == 'chk_int' and value.isnumeric():
            return True
    to_return = input(f'{prefix}{text}')
    while True:
        if len(to_return) > 0 and check_input_isnumber(to_return):
            if mode == 'chk_float':
                return float(to_return)
            elif mode == 'chk_int':
                return int(to_return)
        else:
            to_return = input(f'รับข้อมูลไม่สำเร็จลองใหม่อีกครั้ง!\n{prefix}{text}')

def cool_waiter():
    """หน่วงเวลา"""
    time.sleep(0.1)
    print('')
    for i in range(0,9):
        time.sleep(0.05)
        print(f'\rกำลังประมวลผล {"."*i}',end='')
    print('\n')

def log_worker(text):
    """เก็บบันทึกการคำนวณ"""
    now = datetime.now()
    dt_string_b = now.strftime("%d/%m/%Y %H:%M:%S")
    try:
        with open(f'{SYSPATH}/{LOGFILE}','x',encoding='utf-8') as log_a:
            log_a.write(f'# บันทึกการคำนวณสร้างครั้งแรกวันที่ {dt_string_b} #\nProgram By {DECODED}\n')
    except FileExistsError:
        pass
    with open(f'{SYSPATH}/{LOGFILE}','a+',encoding='utf-8') as log_a:
        log_a.write(f'\n# {dt_string_b}\n{text}\n')

class Cal:
    """คลาสคำนวณ"""
    def cal_selector(self):
        """เลือกการทำงาน"""
        print('\nเลือกการทำงานที่ต้องการ')
        print('\t1. v = u + at')
        print('\t2. s = (u+v) t / 2')
        print('\t3. s = ut + 1 / 2 att')
        print('\t7. v = u + at Version ทดลอง')
        print('\n\t9. จบการทำงาน')
        quest = int(secure_input('\t>>> ',mode='chk_int'))
        if quest in [1,2,3,7]:
            self.horizontal_movement(quest)
        else:
            print('จบการทำงาน \n')
            return 'exit'

    def horizontal_movement(self,mode):
        """คำนวณ"""
        match mode:
            case 1:
                print('1. สูตร [ v  =  u  +  at ]')
                u_value = float(secure_input('\tกรุณากรอก u = ความเร็วต้น (m/s) >> '))
                a_value = float(secure_input('\tกรุณากรอก a = ความเร่ง (m/s2) >> '))
                t_value = float(secure_input('\tกรุณากรอก t = เวลา (sec) >> '))
                v_value = u_value + (a_value * t_value)
                if v_value >= 0:
                    text = 'ทิศตรงข้าม'
                else:
                    text = 'ทิศหลัก'
                cool_waiter()
                cal_f = f'{"="*20}\nv = u + at\n{"="*20}\n{v_value} = {u_value} + ({a_value} * {t_value})\n{"="*20}\nผลลัพธ์ คือ {v_value} ({text})'
                print(cal_f)
                log_worker(cal_f)
            case 2:
                print('2. สูตร [ s  =  (u+v)  t  /  2 ]')
                u_value = float(secure_input('\tกรุณากรอก u = ความเร็วต้น (m/s) >> '))
                v_value = float(secure_input('\tกรุณากรอก v = ความเร็วปลาย (m/s) >> '))
                t_value = float(secure_input('\tกรุณากรอก t = เวลา (sec) >> '))
                s_value = (u_value + v_value) * t_value / 2
                cool_waiter()
                cal_f = f'{"="*20}\ns = (u+v) t / 2\n{"="*20}\n{s_value} = ({u_value} + {v_value}) * {t_value} / 2\n{"="*20}\nผลลัพธ์ คือ {s_value}'
                print(cal_f)
                log_worker(cal_f)
            case 3:
                print('3. สูตร [ s = ut  +  1  /  2att ]')
                u_value = float(secure_input('\tกรุณากรอก u = ความเร็วต้น (m/s) >> '))
                a_value = float(secure_input('\tกรุณากรอก a = ความเร็วปลาย (m/s2) >> '))
                t_value = float(secure_input('\tกรุณากรอก t = เวลา (sec) >> '))
                s_value = (u_value * t_value) + ((1 / 2) * a_value * t_value * t_value)
                cal_f = f'{"="*20}\ns = ut + 1 / 2att\n{"="*20}\n{s_value} = ({u_value} * {t_value}) + ((1 / 2) * {a_value} * {t_value} * {t_value})\n{"="*20}\nผลลัพธ์ คือ {s_value}'
                cool_waiter()
                print(cal_f)
                log_worker(cal_f)
            case 7:
                u_value = float(secure_input('\tกรุณากรอก u = ความเร็วต้น (m/s) >> '))
                a_value = float(secure_input('\tกรุณากรอก a = ความเร่ง (m/s2) >> '))
                t_value = int(secure_input('\tกรุณากรอก t = เวลา (sec) >> ',mode='chk_int'))
                t_dyn = 0
                print('')
                while t_dyn <= t_value:
                    v_value = u_value + (a_value * t_dyn)
                    time.sleep(0.03)
                    if v_value >= 0:
                        text = 'ทิศตรงข้าม'
                    else:
                        text = 'ทิศหลัก'
                    print(f'\rความเร็วปลาย (Final Velocity) {v_value:.2f} [m/s] [ไปใน{text}] = {u_value} [m/s] + ({a_value} [m/s2] * {t_dyn:.2f} [sec])',end='')
                    t_dyn += 0.1
                print('\n\n* Version ทดลองอาจไม่ถูกต้องตามหลักการ *\n')

cal = Cal()
while True:
    if cal.cal_selector() in ['exit']:
        break
