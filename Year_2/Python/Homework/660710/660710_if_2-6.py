try:
    A = int(input('Please Enter Your First Int : '))
    B = int(input('Please Enter Your Second Int : '))
    print(f'Result = {A*B}')
    if A*B < 1000:
        print('Multiple of two number is less than 1000')
except:
    print('Error!')
    raise