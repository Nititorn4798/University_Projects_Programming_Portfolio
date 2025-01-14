print('โปรแกรมทอนเงิน')
paid = float(input('กรอกจำนวนเงินที่ต้องจ่าย : '))
receive = float(input('กรอกจำนวนเงินที่ได้รับมา : '))
receive = receive - paid
end = 65535
for i in range(end):
        if receive > 0:
            print(f'เงินคงเหลือคือ : {receive}')
            moneyIp = int(input('เลือกธนบัตรที่ท่านต้องการ (1000 , 500 , 100 , 50 , 20) >>> '))
            if moneyIp == 1000 and receive >= 1000:
                receive = receive - 1000

            if moneyIp == 500 and receive >= 500:
                receive = receive - 500

            if moneyIp == 100 and receive >= 100:
                receive = receive - 100

            if moneyIp == 50 and receive >= 50:
                receive = receive - 50

            if moneyIp == 20 and receive >= 20:
                receive = receive - 20

            if receive == 0:
                print(f'เงินคงเหลือคือ : {receive}')
                print('เหลือเงินคงเหลือ 0.0 เสร็จสมบูรณ์')
                break      

            if receive <= 20 and receive > 0:
                print(f'เงินคงเหลือคือ : {receive}')
                print('เหลือน้อยกว่า 20 ไม่สามารถถอนได้กรุณาติดต่อพนักงาน')
                break
        else:
            if receive < 0 :
                print(f'คุณขาดเงิน {-receive}')
                break
            else:
                print(f'เงินคงเหลือคือ : {receive}')
                print('เหลือเงินคงเหลือ 0.0 เสร็จสมบูรณ์')
                break              
print('จบการทำงาน')