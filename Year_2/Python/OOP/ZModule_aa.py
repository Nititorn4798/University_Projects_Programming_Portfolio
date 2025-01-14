def cal(x, y, mode):
    match mode:
        case '+':
            return x + y
        case '-':
            return x - y
        case '*':
            return x * y
        case '/':
            if y not in [0]:
                return x / y
            else:
                return f'{x} หารด้วย 0 ไม่ได้'