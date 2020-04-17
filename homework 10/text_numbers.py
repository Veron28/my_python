with open('text.txt', encoding='utf-8') as file:
    obj = file.readlines()
with open("update_text.txt", 'w') as output_file:
    for i in range(len(obj)):
        output_file.write(str(i + 1 ) + " " + obj[i])

