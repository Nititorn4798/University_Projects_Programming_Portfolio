mypath = "/Dev/Coding/Python/Inclass/Homework/660911"
myfile = "t3.txt"

#? Write Only (‘w’) : Open the file for writing. 
#? For the existing files, the data is truncated and over-written. 
#? The handle is positioned at the beginning of the file. 
#? Creates the file if the file does not exist.

ff = open(f'{mypath}/{myfile}', 'w', encoding="utf-8") #!W Only
ff.write("1. Line One")
ff.write("\n")
ff.write("2. Line Two")
ff.write("\n")
ff.write("3. Line CALL")
ff.write("\n")
ff.close()