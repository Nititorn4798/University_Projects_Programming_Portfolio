class Parrot:

    # class attribute
    name = ""
    age = 0
    color = ""

# create parrot1 object
parrot1 = Parrot()
parrot1.name = "Blu"
parrot1.age = 10
parrot1.color = "Green"

# create another object parrot2
parrot2 = Parrot()
parrot2.name = "Woo"
parrot2.age = 15
parrot2.color = "Yellow"

# access attributes
print(f"{parrot1.__class__.__name__}")
print(f"{parrot1.name} is {parrot1.age} years old and color is {parrot1.color}")
print(f"{parrot2.name} is {parrot2.age} years old and color is {parrot2.color}")