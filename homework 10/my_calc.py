import os

k = str(input())
if k[-2:] == "/0" or k[-3:] == "/ 0":
    print("Ошибка деления на ноль!")
else:
    print(str(os.system("set /a " + k))[:-1])