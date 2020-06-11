from django.shortcuts import render, redirect


def red(request):
	return redirect('http://127.0.0.1:8000/account/login')