x = int(input('\t>>> '))
if x < 0:
    raise ValueError('Error ')
else:
    print('x = ', x)
    
if not type(x) is int:
    raise TypeError('Only Integers are allow')
else:
    print('True')