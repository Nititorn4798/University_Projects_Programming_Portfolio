def Factorial (num) :
    if num == 0 :
        return 1

    ans = num
    for i in range(1,num) :
        print('Answer : ',ans)
        print('i : ',i)
        print('-------------------')
        ans = ans * i
    return ans

print('Answer : ',Factorial(3))