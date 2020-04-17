import tkinter
import json

with open("tasks.json") as write_file:
    tasks = json.load(write_file)

def app():
    tasks.append({"name": task.get(), "category": category.get(),
                  "time": time.get()})
def op():
    print(tasks)

def exIt():
    window.destroy()

window = tkinter.Tk()
window.title("Менеджер задач")
window.geometry("220x180")

name1 = tkinter.Label(text="Задача:").grid(row=1, column=0)
name2 = tkinter.Label(text="Категория:").grid(row=2, column=0)
name3 = tkinter.Label(text="Время:").grid(row=3, column=0)

task = tkinter.StringVar()
category = tkinter.StringVar()
time = tkinter.StringVar()

tasksshow = tkinter.Entry(window, width = 20, textvariable=task).grid(row=1, column=1)

categoryShow = tkinter.Entry(window, width = 20, textvariable=category).grid(row=2, column=1)

timeShow = tkinter.Entry(window, width = 20, textvariable=time).grid(row=3, column=1)

but1 = tkinter.Button(window, text="Заказать", width = 10, command= app).grid(row = 4, column = 1)
but2 = tkinter.Button(window, text="Список задач", width = 12 , command= op).grid(row = 5, column = 1)
but3 = tkinter.Button(window, text="Выход", width = 9, command= exIt).grid(row = 6, column = 1)
window.mainloop()
