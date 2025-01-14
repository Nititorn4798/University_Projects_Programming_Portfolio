
#! Loop For While

data = [1,3,2,1]
for i in data:
    print(i)

for i in range(5): #0-4
    print(i)

for i in range(1,5): #1-4
    print(i)
    
for i in range(1,5): #1-2
    if i == 3:
        break # ExitLoop
    print(i)

for i in range(1,5): #1-4
    print(i)
else:
    print('Loop Done Only')

#! While
i = 1
while i <= 10: #!1-10
    print(i)
    i += 1
else:
    print('Loop Done Only')

i = 1
while i <= 10: #!1-4
    if i == 5:
        break # ExitLoop
    print(i)
    i += 1
else:
    print('Loop Done Only')