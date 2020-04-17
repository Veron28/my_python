import tkinter
import random

with open('words.txt', encoding='utf-8') as file:
    obj = file.readlines()


def click():
    if var.get().lower() == str(k[1]):
        que.set("угадали")
    else:
        que.set("Не угадали")

def exIt():
    window.destroy()

k = random.choice(obj).strip().split()



window = tkinter.Tk()

que = tkinter.StringVar()
var = tkinter.StringVar()
que.set(" ")

# frame = tkinter.Frame(window)
# frame.pack()

label1 = tkinter.Label(window, text="Случайное слово")
label1.pack()

word = tkinter.Label(window, text=str(k[0]))
word.pack()

label2 = tkinter.Label(window, text="Укажите перевод слова:")
label2.pack()

entry = tkinter.Entry(window, textvariable=var)
entry.pack()

winlose = tkinter.Label(window, textvariable=que)
winlose.pack()

button = tkinter.Button(window, text='Готово!', command=click)
button.pack()

ex =  tkinter.Button(window, text='Выход!', command=exIt)
ex.pack()
window.mainloop()
