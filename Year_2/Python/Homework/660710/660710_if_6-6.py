try:
    Height = float(input('Input Your Height (Cm.) : '))
    Weight = float(input('Input Your Weight (Km.) : '))
    bmi = Weight / (Height / 100) ** 2
    print(f'BMI = {bmi:.2f}')
    if bmi > 40:
        print('Obesity Step 3.')
    elif bmi >= 35.00:
        print('Obesity Step 2.')
    elif bmi >= 30.00:
        print('Obesity Step 1.')
    elif bmi >= 25.00:
        print('Already overweight.')
    elif bmi >= 18.5:
        print('Weight is normal.')
    elif bmi < 18.5:
        print('Weight below a threshold.')
except:
    print('Error!')
    raise