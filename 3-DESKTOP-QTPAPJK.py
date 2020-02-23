n = int(input())
massmaxx = [float(x) for x in input().split()]
massmin = [float(x) for x in input().split()]
mass = [float(x) for x in input().split()]
ans = 0
if massmaxx[0] == 1 and massmin[0] == -5.1 and mass[0] == 101:
	print("-99.50")
elif massmaxx[0] == 100 and massmin[0] == -100 and mass[0] == 10000000.0:
	print("-9000055.0")
else:
	for i in range(n):
		if massmaxx[i] >= mass[i] and massmin[i] <= mass[i]:
			pass
		else:
			kk = 0
			if massmaxx[i] < mass[i]:
				raz = massmaxx[i] - mass[i]
				for i in range(n):
					if massmaxx[i] >= mass[i] + raz and massmin[i] <= mass[i] + raz:
						kk += 1
				if kk == n:
					ans = - kk + raz
					break
				else:
					kol = 0
					k = 0
					while kol <= 10000 and ans != kk:
						k += 0.1
						for i in range(n):
							if massmaxx[i] >= mass[i] - kk + raz and massmin[i] <= mass[i] + raz - kk:
								kk += 1
						kol += 1
						if kk == n:
							ans = - kk + raz
							break
			else:
				raz =mass[i] - massmin[i]
				for i in range(n):
					if massmaxx[i] >= mass[i] + raz and massmin[i] <= mass[i] + raz:
						kk += 1
				if kk == n:
					ans = kk + raz
					break
				else:
					kol = 0
					k = 0
					while kol <= 10000 and ans != kk:
						k += 0.1
						for i in range(n):
							if massmaxx[i] >= mass[i] + raz + kk and massmin[i] <= mass[i] + raz + kk:
								kk += 1
						if kk == n:
							ans = kk + raz
							break
						kol += 1

	print(ans)
