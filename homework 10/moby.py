import re

with open('moby.txt') as file:
    obj = file.readlines()
ans = []
with open("moby_clean.txt", 'w') as output_file:
    for i in obj:
        ans.append(re.sub(r"[^A-Za-zА-Яа-я]+", ' ', i).lower().strip(). split())
        for j in ans[-1]:
            output_file.write(j + "\n")
