def main():
    
    print("Hello World")
    def sub_func1():
        print("This is sub function (Inner Function) 1.")
    print("Welcome Thailand")
    def sub_func2():
        print("This is sub function (Inner Function) 2.")
        def subsub_func22():
            print("This is subsub function (Inner Function) 2.2")
        subsub_func22()
    print("Bye Bye Your Welcome")
    sub_func1()
    sub_func2()

print('\033c')
print("="*20,"\nEnter Main Function\n\n")
main()
print("\n\nExit Main Function")
