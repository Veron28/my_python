var = {"паразиты" : [(12, 16, 20), (250, 350, 450)],
       "1917" : [(10, 13, 16), (250, 350, 350)],
       "соник в кино" : [(10, 14, 18), (350, 450, 450)]}

film = input("Выберите фильм: ").lower()
data = 1 if input("Выберите дату: ").lower() == "сегодня" else 0
time = int(input("Выберите время: "))
tickets = int(input("Количество билетов: "))

sale = 0

if not data:
	sale = 5
if tickets >= 20:
	sale = 20

price = var[film][1][var[film][0].index(time)]
price *= (100 - sale) / 100
print(price)
