try:
    Ans = {'A':'Excellent','B':'Above Average','C':'Average','D':'Below Average','F':'Fail','X':'Input Error'}
    Grade = str(input('กรุณากรอกเกรดของคุณ : '))
    if(Grade in ["A","B","C","D","F"]):
        print(Ans[Grade])
    else:
        print(Ans["X"])
except:
    print('Error!')
    raise