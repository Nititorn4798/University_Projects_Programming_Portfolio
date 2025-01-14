print('โปรแกรมคิดเงิน')
print('เลือกโหมดที่ท่านต้องการ')
print('พิมพ์ + เลือกโหมดบวกเลข (Default)')
print('พิมพ์ - เลือกโหมดลบเลข')
print('พิมพ์ = เลือกจบการคำนวณ')

runoutside = True
run = True
mode = '+'
sum = 0.0

while runoutside :
    try:
        inputM = str(input('เลือกโหมดที่ท่านต้องการ + - : '))
        if len(inputM) > 1:
            print('Error!!')
            break
        match inputM:
            case '+':
                mode = '+'
            case '-':
                mode = '-'
    except:
        print('Error!!')
        
    while run :
        inputA = input(f'กรอกข้อมูล (โหมด {mode}) : ')
        if inputA == '=':
            mode = '='
            run = False
            break
        match mode:
            case '+':
                numA = float(inputA)
                sum = sum + numA
            case '-':
                numA = float(inputA)
                sum = sum - numA
        print('ผลลัพธ์คือ : ' ,sum)
    print('ผลลัพธ์สุดท้ายคือ : ' ,sum)    
    qInput = str(input('ต้องการคำนวณต่อไหม (Y : N) : '))
    if qInput in ['Y','y']:
        runoutside = True
        run = True
    else:
        runoutside = False
        print('จบการทำงาน')