service = 0
t1 = "========================================"
exit = False
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
            [105,'สีฟ้า',1005]]
room_status = {
    101: 1,
    102: 2,
    103: 1,
    104: 2,
    105: 1
}

def room_check(roomI):
    if roomI == 1:
        return "ว่าง"
    elif roomI == 2:
        return "ไม่ว่าง"
    elif roomI == 3:
        return "ซ่อมบำรุง"
    
def service_select():
    while True:
        try:
            choice = int(input("กรอกตัวเลือกที่ต้องการ >> "))
            if (choice >= 1) and (choice <= 4):
                service = choice
                print(f"คุณได้เลือก... {service}", end="\n\n")
                break #ออก LOOP ใช้กับ While
            else:
                print("โปรดเลือกตัวเลขที่กำหนดให้...\n")
        except:
            print("Error")

def room_select():
    while True:
        try:
            choice = int(input("กรอกเลขห้องที่ต้องการ >> "))
            
            if (choice == 101) or (choice == 102) or (choice == 103) or (choice == 104) or (choice == 105):
                if ({room_status[choice]}) == {1}:
                    selectedroom = choice
                    print(f"คุณได้เลือกห้อง {selectedroom}", end="\n\n")
                    room_status[selectedroom] = 2
                    break #ออก LOOP ใช้กับ While
                elif ({room_status[choice]}) != {1}:
                    print("โปรดเลือกห้องที่ว่าง...\n")
            else:
                print("โปรดเลือกห้องที่กำหนดให้...\n")

        except:
            print("Error")

def book_room():
    try:
        print('==== เลือกห้องที่คุณต้องการพัก ====',end="\n\n")
        for i in room_Data:
            print(t1)
            print(f'ห้องเลขที่ {i[0]} \nสีของห้อง {i[1]} \nราคา {i[2]} บาท')
            print(f'ห้องนี้ {room_check(room_status[i[0]])}')
            print(f'Debug {room_status[i[0]]}') 
            print(t1)
            room_select()
    except:
        print("Error")

def book_cancels():
    print(t1)
    print(f'ห้องเลขที่ {selectedroom} \n สามารถยกเลิกได้')
    print(t1)
    print
    print('กรอกเลขห้องที่ท่านต้องการยกเลิก >>')
    cancelsRoom = int(input())
    if cancelsRoom != selectedroom :
        print('ห้องที่คุณยกเลิกไม่ใช้ห้องที่คุณจอง')
    else :
        room_status[selectedroom] = 1
        print(f'ยกเลิกการจองห้อง {cancelsRoom} แล้ว!')

#Main
while exit == False:
    main_menu()
    service_select()
    print(f'debug {service}')
    if service == 1:
        book_room()
    elif service == 2:
        book_room()
    elif service == 3:
        book_room()
    elif service == 4:
        print('ขอบคุณที่ใช้บริการ จัดทำโดยนายนิติธร นันทสินธ์ CS65003263019')
        exit()
