import os

mypath = "/Dev/Coding/Python/Inclass/Homework/660911"
myfile = "t4.txt"

#? Open a file for exclusive creation. 
#? If the file already exists, the operation fails.

try:
    fh = open(f'{mypath}/{myfile}', 'x', encoding="utf-8") #!exclusive creation
except:
    mypathh = "/Dev/Coding/Python/Inclass/Homework/660911/t4.txt"
    os.remove(mypathh)

