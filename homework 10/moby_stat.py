with open('moby_clean.txt') as file:
    obj = file.readlines()
ans = []
for i in obj:
    for j in i.split():
        ans.append(j)
print(sorted(set(ans), key=ans.count)[::-1][:5])
print(sorted(set(ans), key=ans.count)[:5])

