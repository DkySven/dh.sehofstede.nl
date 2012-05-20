from images.models import *
from django.shortcuts import render_to_response, get_object_or_404
from django.core.paginator import Paginator, EmptyPage, PageNotAnInteger

def show(request, page=None):
	
	image_list = ImageSubmit.objects.all()
	paginator = Paginator(image_list, 1)

	try:
		images = paginator.page(page)
	except PageNotAnInteger:
		images = paginator.page(1)
	except EmptyPage:
		images = paginator.page(paginator.num_pages)

	return render_to_response('photo.html', {'images': images})
