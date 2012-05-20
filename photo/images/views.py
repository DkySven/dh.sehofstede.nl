from images.models import *
from django.shortcuts import render_to_response

def show(request):
	images = ImageSubmit.objects.all()
	return render_to_response('photo.html', {'images': images})

def index(request):
	return render_to_response('index.php')
