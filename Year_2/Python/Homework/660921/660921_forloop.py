x = 3
y = 3
z = 3
zz = 3
zzz = 3
# อาจารย์สอน 3ชั้น
op = 0
for i in range(1,x + 1):
    for j in range(1,y + 1):
        for k in range(1,z + 1):
            for l in range(1,zz + 1):
                for m in range(1,zzz + 1):
                    op += 1
                    print(op,'Hello ',i,j,k,l,m)