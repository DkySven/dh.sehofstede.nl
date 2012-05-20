from images.models import *
from django.shortcuts import render_to_response

def imgid(request):
	img_id = 1

def show(request):

	img_id = 1

	images = ImageSubmit.objects.get(id=img_id)
	return render_to_response('photo.html', {'images': images, 'img_id': img_id})
