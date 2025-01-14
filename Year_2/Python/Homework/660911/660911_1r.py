# แนะนำให้รู้จักกับ “With” Statement
# https://www.borntodev.com/2023/01/17/%E0%B8%A3%E0%B8%B9%E0%B9%89%E0%B8%88%E0%B8%B1%E0%B8%81%E0%B8%81%E0%B8%B1%E0%B8%9A-python-with-statement/

#! https://www.geeksforgeeks.org/reading-writing-text-files-python/

f = open("/Dev/Coding/Python/Inclass/Homework/660911/t1.txt", "r", encoding="utf-8")
print(f.read())
f.close()

#? Read Only (‘r’) : Open text file for reading. 
#? The handle is positioned at the beginning of the file. 
#? If the file does not exists, raises the I/O error. 
#? This is also the default mode in which a file is opened.

pathh = "/Dev/Coding/Python/Inclass/Homework/660911"
with open(f"{pathh}/t1.txt", "r", encoding="utf-8") as fileX:
    print(fileX.read())
    
f = open("/Dev/Coding/Python/Inclass/Homework/660911/t1.txt", "r", encoding="utf-8")
for i in f:
    print(i)
f.close()

f = open("/Dev/Coding/Python/Inclass/Homework/660911/t1.txt", "r", encoding="utf-8")
for indeX,text in enumerate(f):
    print(f'{indeX} {text}')
f.close()
