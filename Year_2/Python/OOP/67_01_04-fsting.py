a = 999
A = 8888
print(f'a = {a}')
print('a = {} A = {}'.format(a,A))
print('a = ',a,' A = ',A)
text = "{} x {} = {}"
for j in range(2,6):
    for i in range(13):
        print(text.format(j,i,j*i))
    print("{}".format("*"*10))

formatt = "my name is {} nickname is {}"
name = "Nititorn"
nick = "Dong"

print(formatt.format(name,nick))