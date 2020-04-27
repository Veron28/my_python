from django.db import models


class User(models.Model):
	first_name = models.CharField(max_length=20)
	last_name = models.CharField(max_length=20)
	login = models.CharField(max_length=20)
	password = models.CharField(max_length=20)
	vk = models.CharField(max_length=50)