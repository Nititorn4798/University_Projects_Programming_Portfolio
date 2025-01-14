try:
    Score = int(input('กรอกคะแนนของคุณ : '))
    if Score >= 50:
        print('คุณผ่าน')
    else:
        print('คุณตก')
except:
    print('Error!')
    raise