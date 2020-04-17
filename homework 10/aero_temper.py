import matplotlib.pyplot as plt

with open('temper.stat.txt') as file:
    obj = file.readlines()
minn = float('inf')
maxx = -float('inf')
summ = 0
for i in obj:
    minn = min(minn, float(i.strip()))
    maxx = max(maxx, float(i.strip()))
    summ = float(i.strip())
plt.plot(obj)
print(minn, end = " ")
print(maxx, end=" ")
print(summ/len(obj), end=" " )
print(len(set(obj)), end=" ")