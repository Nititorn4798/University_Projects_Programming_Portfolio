class  A  :
    @staticmethod
    def  add(typeD,*arg) :
        x=''
        if typeD == 'int' :
            x = 0 
        if typeD == 'float' :
            x = 0.0  
        if typeD == 'str'   :
            x = ''
        for i in arg :
            x = x+i
        print(x)    
A.add('int',2,3,4)
A.add('float',2.5,3.9, 4.7, 1.2)
A.add('str',"Watcharapong"," ","Krukaset")
