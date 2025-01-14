mypath = "/Dev/Coding/Python/Inclass/Homework/660911"
myfile = "t2.txt"

#? Append Only (‘a’): Open the file for writing. 
#? The file is created if it does not exist. 
#? The handle is positioned at the end of the file. 
#? The data being written will be inserted at the end, after the existing data.

ff = open(f'{mypath}/{myfile}', 'a', encoding="utf-8") #!Append Only
ff.write("\n") #!ขึ้นบรรทัดใหม่
ff.write("Add New Line")
ff.close()