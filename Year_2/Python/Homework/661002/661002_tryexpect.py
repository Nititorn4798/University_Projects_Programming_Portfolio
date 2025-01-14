import os
import sys

MYPATH = os.path.dirname(os.path.abspath(sys.argv[0]))
MYFILE = "texttest.txt"

try:
    print(f'{MYPATH}/{MYFILE}')
    f = open(f'{MYPATH}/{MYFILE}','r',encoding='utf-8')
    try:
        f.write('\n'+'เทสๆมะเขือเทส')
    except:
        print('เออเร้อครับพรี่')
        raise #! แสดง Error ที่ เจอ
except FileNotFoundError:
    print('ผมหาไฟล์ไม่เจอครับ')
    raise #! แสดง Error ที่ เจอ
else:
    print('การทำงานปกติครับผม')
finally:
    print('ทำงานเสร็จแล้วครับพรี้')