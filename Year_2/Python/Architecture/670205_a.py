try:
    data = input("Enter binary value: ")
    PARITY_BIT_E = 0
    PARITY_BIT_O = 1

    for idx ,val in enumerate(data):
        PARITY_BIT_E ^= int(val)
        PARITY_BIT_O ^= int(val)
        print(f'i : {idx} value : {val}')
        print ("Paritity Bit Even:",PARITY_BIT_E)
        print ("Paritity Bit Odd:",PARITY_BIT_O,'\n')
    print ("Binary value with parity bit Even:",f'{data}{str(PARITY_BIT_E)}')
    print ("Binary value with parity bit Odd:",f'{data}{str(PARITY_BIT_O)}')
except:
    print('error')
    raise