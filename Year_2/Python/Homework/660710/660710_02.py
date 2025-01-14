try:
    a = float(input('Input Height (Cm.) = '))
    b = float(input('Input Weight (kg.) = '))
    bmi = b / (a / 100) ** 2
    print(f'Result = {bmi:.2f}')
except:
    print('Error!!!')
    raise
