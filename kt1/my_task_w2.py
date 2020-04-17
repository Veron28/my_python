import tkinter
import json
import tkinter.scrolledtext as scroll

tasks = []


def app():
    meneg = {"name": task.get(), "category": category.get(), "time": time.get()}
    written(meneg)
    tasks.append(meneg)
    return tasks


def op():
    for i in tasks:
        for j in i:
            scr.insert('insert', str(j) + ": "  +  str(i[str(j)]) + "\n")


def exIt():
    window.destroy()


def written(name):
    with open("tasks.json", 'w') as write_file:
        json.dump(name, write_file)


window = tkinter.Tk()
window.title("Менеджер задач")
window.geometry("600x200")

task = tkinter.Entry()
task.grid(row=1, column=1)
category = tkinter.Entry()
category.grid(row=2, column=1)
time = tkinter.Entry()
time.grid(row=3, column=1)

scr = scroll.ScrolledText(window, width=45, height=6)
scr.grid(row=1, column=2, rowspan=4)

name1 = tkinter.Label(text="Задача:").grid(row=1, column=0)
name2 = tkinter.Label(text="Категория:").grid(row=2, column=0)
name3 = tkinter.Label(text="Время:").grid(row=3, column=0)

but1 = tkinter.Button(window, text="Заказать", width=10, command=app).grid(row=4, column=1)
but2 = tkinter.Button(window, text="Список задач", width=12, command=op).grid(row=5, column=1)
but3 = tkinter.Button(window, text="Выход", width=9, command=exIt).grid(row=6, column=1)

window.mainloop()
