try:
    Gender = str(input('กรุณาเลือกเพศของคุณ (ช,ญ) , (m,f) : '))
    Height = float(input('กรุณากรอกส่วนสูงของคุณ : '))
    xy = 0
    if Gender in ["m","ช"]:
        print('คุณเป็นผู้ชาย')
        xy = 100
    elif Gender in ["f","ญ"]:
        print('คุณเป็นผู้หญิง')
        xy = 110
    print(f'น้ำหนักที่เหมาะสมของคุณคือ {Height - xy}')
except:
    print('Error!')
    raise