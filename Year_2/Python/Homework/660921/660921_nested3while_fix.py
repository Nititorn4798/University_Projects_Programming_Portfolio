import random
x = 1
y = 1
z = 1
m = 0
isnotbingo = True
while isnotbingo:
    x = 1
    while x <= 3:
        y = 1
        random_numberX = random.randint(0, 10)
        while y<= 3:
            z = 1
            random_numberY = random.randint(0, 10)
            while z <= 3:
                m = m + 1
                random_numberZ = random.randint(0, 10)
                print('\u001b[35m',m,'Hello ',random_numberX ,random_numberY ,random_numberZ)
                if (random_numberX == 9) and (random_numberY == 9) and (random_numberZ == 9):
                    print('\t','\u001b[33m','Yeah!! Bingo!!','\u001b[35m')
                    print('\t','\u001b[33m','Yeah!! Bingo!!','\u001b[35m')
                    print('\t','\u001b[33m','Yeah!! Bingo!!','\u001b[35m')
                    isnotbingo = False
                    break
                z = z + 1
            y = y + 1
        x = x + 1