try:
    Salary = float(input('Please Enter Your Salary : '))
    if Salary > 50000:
        Salary = Salary - (Salary * 0.03)
    print(f'Salary = {Salary}')
except:
    print('Error!')
    raise