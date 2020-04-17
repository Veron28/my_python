import json

with open("tasks.json") as write_file:
    tasks = json.load(write_file)
    print("текущие задачи из файла:")
    print(tasks)
    to_do = input("1. Добавить задачу.\n2. Вывести список задач.\n3. Выход.")

    while to_do !=  "3":
        if to_do == "1":
            tasks.append({"name": input("Сформулируйте задачу"), "category": input("Добавьте категорию к задаче:"), "time": input("Добавьте время к задаче")})
        if to_do == "2":
            for i in range(len(tasks)):
                for j in (tasks[i]):
                    print(str(j) + ": " + str(tasks[i][j]))
        if to_do == "3":
            print("задачи сохранены в файл!")
            break
        to_do = input("1. Добавить задачу.\n2. Вывести список задач.\n3. Выход.")

json.dump(tasks, open('tasks.json','w'))

print(tasks)