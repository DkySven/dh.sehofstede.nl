from images.models import *
from django.shortcuts import render_to_response, get_object_or_404

def show(request, imgid=None):
	
	if imgid == None:
		image = ImageSubmit.objects.all()[0]
	else:
		image = get_object_or_404(ImageSubmit, id=imgid)

	previmg = ImageSubmit.objects.filter(id__lt=image.id).order_by("-id")

	if previmg:
		previmg = previmg[0]
	else:
		previmg=None

	nextimg = ImageSubmit.objects.filter(id__gt=image.id)
	
	if nextimg:
		nextimg = nextimg[0]
	else:
		nextimg=None

	context = {
		'previmg': previmg,
		'image': image,
		'nextimg': nextimg,
	}

	return render_to_response('photo.html', context)
