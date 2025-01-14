"""นาย นิติธร นันทสินธ์ 65003263019"""
def decimal_to_binary(n) :
    """แปลงเลขฐาน10เป็นเลขฐานสอง"""
    return bin(n).replace("0b", "")

class A:
    "Bitwise Left"
    def __init__(self,x) -> None:
        self.x = x
    def __lshift__(self,other):
        return self.x << other.x
int1 = int(input('Input Integer : '))
value1 = A(int1)
value2 = A(int(input('Input Bit Amount To Bitwise Left : ')))
bin1 = decimal_to_binary(int1)
result = A.__lshift__(value1,value2)
bin_after = decimal_to_binary(result)

print('Integer Binary IS ',bin1)
print('Binary After Bitwise IS ',bin_after)
print('Input Integer IS ',int1)
print('Result IS ',result)
