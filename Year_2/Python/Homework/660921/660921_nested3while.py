x = 2
y = 2
z = 2

ct = 1
for i in range(1,x + 1):
    for j in range(1,y + 1):
        for k in range(1,z + 1):
            print(f'{"*"*20}')
            print(f'{ct} : {i} + {j} + {k} = {i + j + k}')
            ct += 1
            print(f'{ct} : {i} - {j} - {k} = {i - j - k}')
            ct += 1
            print(f'{ct} : {i} * {j} * {k} = {i * j * k}')
            ct += 1
            print(f'{ct} : {i} / {j} / {k} = {i / j / k}')
            ct += 1
print(f'{"*"*20}')
