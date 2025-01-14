service = int()
t1 = "========================================"
exit_switch = False
print(t1)
print("     ยินดีต้อนรับสู่โรงแรม นอนกินบ้านกินเมือง      ")
print(t1,end="\n\n")

def main_menu():
    print('',end="\n")
    print("โปรดเลือกการดำเนินการที่ต้องการ \n     1 << เลือกจองห้องที่ว่าง \n     2 << ยกเลิกการจอง \n     3 << ฝากข้อความถึงพนักงานโรงแรม \n     4 << จบการทำงานโปรแกรม")
    print(t1)

#Room Data V1 List Element
room_Data = [[101,'สีขาว',1000],
            [102,'สีม่วง',1002],
            [103,'สีแดง',1003],
            [104,'สีส้ม',1004],
            [105,'สีรุ้ง',1005]]
room_status = {
    101: 1,
    102: 2,
    103: 1,
    104: 2,
    105: 3
}
staffData = [['st001','น้องจันทร์เจ้า'],
            ['st002','น้องแนน'],
            ['st003','น้องขนมปังใบเตยสังขยา'],
            ['st004','น้องการะเกด'],
            ['st005','น้องกะละมัง']]

class hotel:
    selectedroom = int()

    def room_check(room_i):
        if room_i == 1:
            return "ว่าง ✓"
        elif room_i == 2:
            return "ไม่ว่าง X"
        elif room_i == 3:
            return "ซ่อมบำรุง X"
        
    def service_select():
        global service #ทำให้แก้ตัวแปร service ใน class ได้
        while True:
            try:
                choice = int(input("กรอกตัวเลือกที่ต้องการ >> "))
                if (choice >= 1) and (choice <= 4):
                    service = choice
                    print('\033c') #clear screen
                    print(f"คุณได้เลือก... {service}", end="\n\n")
                    break #ออก LOOP ใช้กับ While
                else:
                    print("โปรดเลือกตัวเลขที่กำหนดให้...\n")
            except:
                print("Error")

    def room_select():
        global room_status
        while True:
            try:
                choice = int(input("กรอกเลขห้องที่ต้องการ >> "))
                if (choice == 101) or (choice == 102) or (choice == 103) or (choice == 104) or (choice == 105):
                    if ({room_status[choice]}) == {1}: # เช็คห้องว่า ว่างหรือไม่
                        hotel.selectedroom = choice
                        print('\033c') #clear screen
                        print(f"คุณได้เลือกห้อง {hotel.selectedroom}", end="\n\n")
                        print('การจองเสร็จสิ้น ✓')
                        room_status[hotel.selectedroom] = 2
                        break #ออก LOOP ใช้กับ While
                    elif ({room_status[choice]}) != {1}:
                        print("โปรดเลือกห้องที่ว่าง...\n")
                else:
                    print('\033c') #clear screen
                    print("โปรดเลือกห้องที่กำหนดให้...\n")
                    break
            except:
                print("Error At room_select")

    def book_room():
        global room_Data
        try:
            print('==== เลือกห้องที่คุณต้องการพัก ====',end="\n\n")
            for i in room_Data:
                print(t1)
                print(f'ห้องเลขที่ {i[0]} \nสีของห้อง {i[1]} \nราคา {i[2]} บาท')
                print(f'ห้องนี้ {hotel.room_check(room_status[i[0]])}')
                #print(f'Debug Status {room_status[i[0]]}') 
                print(t1)
            hotel.room_select()
        except:
            print("Error")

    def book_cancels():
        if hotel.selectedroom >= 101 and hotel.selectedroom <= 105:
            print(t1)
            print(f'ห้องเลขที่ {hotel.selectedroom} \n สามารถยกเลิกได้')
            print(t1)
            cancelsroom = int(input('กรอกเลขห้องที่ท่านต้องการยกเลิก >> '))
            if cancelsroom != hotel.selectedroom :
                print('\033c') #clear screen
                print('ห้องที่คุณยกเลิกไม่ใช้ห้องที่คุณจอง')
            else :
                room_status[hotel.selectedroom] = 1
                print('\033c') #clear screen
                print(f'ยกเลิกการจองห้อง {cancelsroom} แล้ว !')
        else:
            print('\033c') #clear screen
            print('คุณยังไม่ได้จองห้อง...')

    def leavemessage():
        global staffData
        print(t1)
        print('บริการฝากข้อความถึงพนักงานโรงแรม')
        print(t1,end='\n')
        while True:
            try:
                for i in staffData:
                    print(t1)
                    print(f'รหัสพนักงาน : {i[0]} \nชื่อ : {i[1]}')
                    print(t1,end='\n')

                choice = input("กรอกรหัสพนักงานที่ต้องการฝากข้อความถึง >> ")
                if (choice == 'st001') or (choice == 'st002') or (choice == 'st003') or (choice == 'st004') or (choice == 'st005'):
                    selectStaff = choice
                    message = input("กรอกข้อความที่ต้องการฝากข้อความถึง >> ")
                    if selectStaff == 'st001':
                        selectStaff = 1
                    elif selectStaff == 'st002':
                        selectStaff = 2
                    elif selectStaff == 'st003':
                        selectStaff = 3
                    elif selectStaff == 'st004':
                        selectStaff = 4
                    elif selectStaff == 'st005':
                        selectStaff = 5
                    print('\033c') #clear screen
                    print(t1)
                    print('ข้อความของคุณคือ :',end='\n')
                    print(message)
                    break
                else:
                    print("โปรดใส่รหัสพนักงานให้ถูกต้อง...\n")
                    break
            except:
                print("Error At leavemessage")

#Main
while exit_switch == False:
    main_menu()
    hotel.service_select()
    #print(f'debug {service}')
    if service == 1:
        hotel.book_room()
    elif service == 2:
        hotel.book_cancels()
    elif service == 3:
        hotel.leavemessage()
    elif service == 4:
        print('\033c') #clear screen #020766 23:16
        print(t1,end='\n\n')
        print('ขอบคุณที่ใช้บริการ จัดทำโดย นายนิติธร นันทสินธ์ CS65003263019',end='\n\n')
        print(t1)
        exit_switch = True
