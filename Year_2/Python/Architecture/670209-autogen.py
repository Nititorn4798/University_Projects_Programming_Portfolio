# for i in range(2):
#     for j in range(2):
#         for k in range(2):
#             l = (str(i) + str(j) + str(k))
#             print(l)

# def a():
#     b='a'
#     c=[1,22,33]
#     return [b,c]

# print(a())

# a = [1,1,0,0,1,1,0] #1100110
# b= []
# b.extend(a)

# import random

# rand_list = [0,1,2,3,4,5,6]
# a[random.choice(rand_list)] = str(int(not(int(a[random.choice(rand_list)]))))
# while True:
#     if a == b:
#         print('tf')
#         print(a)
#         print(b)
# bitsize = 15
# index_p1 = set()
# index_p2 = set()
# index_p4 = set()
# index_p8 = set()
# for i in range(1,bitsize,2):
#     index_p1.add(i)

# i = 2
# while i <= 15:
#     while True:
#         index_p2.add(i)
#         index_p2.add(i+1)
#         i = 2*i+(i*2)
#         break
# print(index_p2)

# for i in range(4,bitsize,4):
#     for j in range(i,i+4,1):
#         index_p4.add(i)

# for i in range(8,bitsize,8):
#     for j in range(i,i+8,1):
#         index_p8.add(i)

# print(index_p1,index_p2)

list_binary = [1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f']
# # final_list = [7,7,7,7,7,7,7,7,7,7,7,7,7,7,7]
# final_list = [] * 15
# print(len(final_list))
# for i, j in enumerate(list_binary[::-1],start=3):
#     if i in [3]:
#         print(i,j)
#         final_list[-i] = j
#     elif i in [4,5,6]:
#         final_list[-(i+1)] = j
#     elif i in [8,9,10,11,12,13,14]:
#         final_list[-(i+1)] = j

# print(len(list_binary))
# print(len(list_binary[-1::-1]))
# print((list_binary[::]))
# print((list_binary[::-1]))
# print((list_binary[:-7:-1]))
# print((list_binary[:-8:-1]))
# print((list_binary[:-9:-1]))

# import itertools
# bit = int(input('Input Bit : '))
# for x in map(''.join, itertools.product('01', repeat=bit)):
#     print(x)

lista = [1,1,2,3,5,6,8]
lista = lista[:2+1:]
print(lista)