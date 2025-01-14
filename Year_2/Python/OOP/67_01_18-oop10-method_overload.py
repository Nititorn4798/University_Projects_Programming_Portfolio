def add(a=None, b=None):
    # Checks if both parameters are available
    # if statement will be executed if only one parameter is available
    if a != None and b == None:
        print(a)
    # else will be executed if both are available and returns addition of two
    else:
        print(a+b)

# two arguments are passed, returns addition of two
add(2, 3)
# only one argument is passed, returns a
add(2)