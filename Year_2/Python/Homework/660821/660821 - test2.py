def calculate(i1,i2,oper):
    result = 0 
    match oper:
        case '+':
            result = i1 + i2
        case '-':
            result = i1 - i2
        case '/':
            result = i1 / i2
        case '*' | 'x':
            result = i1 * i2
        case _ :
            return "error"
    def resultbe(result,i1,i2,oper):
        text = "the result of " + str(i1) + " " + oper + " " + str(i2) + " is " + str(result)
        return text
    return resultbe(result,i1,i2,oper)

print("\033c")
print(calculate(50,20,'+'))
print(calculate(50,20,'-'))
print(calculate(10,20,'*'))
print(calculate(10,20,'pp'))