mypath = "/Dev/Coding/Python/Inclass/Homework/660911"
myfile = "t5.txt"

#? Write Only (‘w’) : Open the file for writing. 
#? For the existing files, the data is truncated and over-written. 
#? The handle is positioned at the beginning of the file. 
#? Creates the file if the file does not exist.

ff = open(f'{mypath}/{myfile}', 'w+', encoding="utf-8") #!W Only
while True:
    x = input("Input data [พิมพ์ 'exit' เพื่อออก] : ")
    if x == "exit":
        print("จบการทำง่าน")
        break
    ff.write("\n")
    ff.write(x)
ff.close()
